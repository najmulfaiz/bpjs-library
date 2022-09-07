<?php
namespace NajmulFaiz\Bpjs;

use GuzzleHttp\Client;
use GuzzleHttp\RetryMiddleware;
use LZCompressor\LZString;

class BpjsService{

    /**
     * Guzzle HTTP Client object
     * @var \GuzzleHttp\Client
     */
    private $clients;

    /**
     * Request headers
     * @var array
     */
    private $headers;

    /**
     * X-cons-id header value
     * @var int
     */
    private $cons_id;

    /**
     * X-Timestamp header value
     * @var string
     */
    private $timestamp;

    /**
     * X-Signature header value
     * @var string
     */
    private $signature;

    /**
     * @var string
     */
    private $secret_key;

    /**
     * @var string
     */
    private $user_key;

    /**
     * @var string
     */
    private $base_url;

    /**
     * @var string
     */
    private $service_name;

    public function __construct($configurations)
    {
        $this->clients = new Client([
            'verify' => false
        ]);

        foreach ($configurations as $key => $val){
            if (property_exists($this, $key)) {
                $this->$key = $val;
            }
        }

        //set X-Timestamp, X-Signature, and finally the headers
        $this->setTimestamp()->setSignature()->setHeaders();
    }

    protected function setHeaders()
    {
        $this->headers = [
            'X-cons-id'   => $this->cons_id,
            'X-timestamp' => $this->timestamp,
            'X-signature' => $this->signature,
            'user_key'    => $this->user_key,
        ];
        return $this;
    }

    protected function setTimestamp()
    {
        $dateTime = new \DateTime('now', new \DateTimeZone('UTC'));
        $this->timestamp = (string)$dateTime->getTimestamp();
        return $this;
    }

    protected function setSignature()
    {
        $data = $this->cons_id . '&' . $this->timestamp;
        $signature = hash_hmac('sha256', $data, $this->secret_key, true);
        $encodedSignature = base64_encode($signature);
        $this->signature = $encodedSignature;
        return $this;
    }

    protected function responseV2Antrol($data) {
        $result = json_decode($data);
        
        if (in_array($result->metadata->code, [200, 1]) && isset($result->response) && is_string($result->response)) {
        // if ($result->metadata->code && in_array($result->metadata->code, [200, 1]) && is_string($result->response)) {
            return $this->decryptResponse($result->metadata, $result->response);
        }

        return json_encode($result);
    }
    
    protected function responseV2($data) {
        $result = json_decode($data);
        
        if ($result->metaData->code ?? '' == '200' and !empty($result->response) and is_string($result->response)) {
            return $this->decryptResponse($result->metaData, $result->response);
        }

        return $result;
    }

    protected function decryptResponse($metadata, $response)
    {
        $encrypt_method = 'AES-256-CBC';
        $key            = $this->cons_id . $this->secret_key . $this->timestamp;
        $key_hash       = hex2bin(hash('sha256', $key));
        $iv             = substr(hex2bin(hash('sha256', $key)), 0, 16);

        $output = openssl_decrypt(base64_decode($response), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);

        $response = LZString::decompressFromEncodedURIComponent($output);

        return [
            "metaData" => $metadata,
            "response" => json_decode($response),
        ];
    }

    protected function get($feature)
    {
        $this->headers['Content-Type'] = 'application/json; charset=utf-8';
        try {
            $response = $this->clients->request(
                'GET',
                $this->base_url . '/' . $this->service_name . '/' . $feature,
                [
                    'headers' => $this->headers
                ]
            )->getBody()->getContents();

            $result = $this->responseV2($response);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
			if ($e->getCode() == 0) {
				$handlerContext = $e->getHandlerContext();
				$result = [
					'metaData' => [
						'code' => $handlerContext['errno'],
						'message' => $handlerContext['error']
					]
				];
			} else
				$result = [
					'metaData' => [
						'code' => $e->getCode(),
						'message' => $e->getMessage()
					]
				];
		}
        return $result;
    }

    protected function post($feature, $data = [], $headers = [])
    {
        $this->headers['Content-Type'] = 'application/x-www-form-urlencoded';
        if(!empty($headers)){
            $this->headers = array_merge($this->headers,$headers);
        }
        try {
            $response = $this->clients->request(
                'POST',
                $this->base_url . '/' . $this->service_name . '/' . $feature,
                [
                    'headers' => $this->headers,
                    'json' => $data,
                ]
            )->getBody()->getContents();

            $result = $this->responseV2($response);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
			if ($e->getCode() == 0) {
				$handlerContext = $e->getHandlerContext();
				$result = [
					'metaData' => [
						'code' => $handlerContext['errno'],
						'message' => $handlerContext['error']
					]
				];
			} else
				$result = [
					'metaData' => [
						'code' => $e->getCode(),
						'message' => $e->getMessage()
					]
				];
		}
        return $result;
    }

    protected function put($feature, $data = [])
    {
        $this->headers['Content-Type'] = 'application/x-www-form-urlencoded';
        try {
            $response = $this->clients->request(
                'PUT',
                $this->base_url . '/' . $this->service_name . '/' . $feature,
                [
                    'headers' => $this->headers,
                    'json' => $data,
                ]
            )->getBody()->getContents();

            $result = $this->responseV2($response);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
			if ($e->getCode() == 0) {
				$handlerContext = $e->getHandlerContext();
				$result = [
					'metaData' => [
						'code' => $handlerContext['errno'],
						'message' => $handlerContext['error']
					]
				];
			} else
				$result = [
					'metaData' => [
						'code' => $e->getCode(),
						'message' => $e->getMessage()
					]
				];
		}
        return $result;
    }


    protected function delete($feature, $data = [])
    {
        $this->headers['Content-Type'] = 'application/x-www-form-urlencoded';
        try {
            $response = $this->clients->request(
                'DELETE',
                $this->base_url . '/' . $this->service_name . '/' . $feature,
                [
                    'headers' => $this->headers,
                    'json' => $data,
                ]
            )->getBody()->getContents();

            $result = $this->responseV2($response);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
			if ($e->getCode() == 0) {
				$handlerContext = $e->getHandlerContext();
				$result = [
					'metaData' => [
						'code' => $handlerContext['errno'],
						'message' => $handlerContext['error']
					]
				];
			} else
				$result = [
					'metaData' => [
						'code' => $e->getCode(),
						'message' => $e->getMessage()
					]
				];
		}
        return $result;
    }

    protected function getAntrol($feature)
    {
        $this->headers['Content-Type'] = 'application/json; charset=utf-8';
        try {
            $response = $this->clients->request(
                'GET',
                $this->base_url . '/' . $this->service_name . '/' . $feature,
                [
                    'headers' => $this->headers
                ]
            )->getBody()->getContents();

            $result = $this->responseV2Antrol($response);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
			if ($e->getCode() == 0) {
				$handlerContext = $e->getHandlerContext();
				$result = [
					'metaData' => [
						'code' => $handlerContext['errno'],
						'message' => $handlerContext['error']
					]
				];
			} else
				$result = [
					'metaData' => [
						'code' => $e->getCode(),
						'message' => $e->getMessage()
					]
				];
		}
        return $result;
    }

    protected function postAntrol($feature, $data = [], $headers = [])
    {
        $this->headers['Content-Type'] = 'application/x-www-form-urlencoded';
        if(!empty($headers)){
            $this->headers = array_merge($this->headers,$headers);
        }
        try {
            $response = $this->clients->request(
                'POST',
                $this->base_url . '/' . $this->service_name . '/' . $feature,
                [
                    'headers' => $this->headers,
                    'json' => $data,
                ]
            )->getBody()->getContents();

            $result = $this->responseV2Antrol($response);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
			if ($e->getCode() == 0) {
				$handlerContext = $e->getHandlerContext();
				$result = [
					'metaData' => [
						'code' => $handlerContext['errno'],
						'message' => $handlerContext['error']
					]
				];
			} else
				$result = [
					'metaData' => [
						'code' => $e->getCode(),
						'message' => $e->getMessage()
					]
				];
		}
        return $result;
    }

    protected function putAntrol($feature, $data = [])
    {
        $this->headers['Content-Type'] = 'application/x-www-form-urlencoded';
        try {
            $response = $this->clients->request(
                'PUT',
                $this->base_url . '/' . $this->service_name . '/' . $feature,
                [
                    'headers' => $this->headers,
                    'json' => $data,
                ]
            )->getBody()->getContents();

            $result = $this->responseV2Antrol($response);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
			if ($e->getCode() == 0) {
				$handlerContext = $e->getHandlerContext();
				$result = [
					'metaData' => [
						'code' => $handlerContext['errno'],
						'message' => $handlerContext['error']
					]
				];
			} else
				$result = [
					'metaData' => [
						'code' => $e->getCode(),
						'message' => $e->getMessage()
					]
				];
		}
        return $result;
    }


    protected function deleteAntrol($feature, $data = [])
    {
        $this->headers['Content-Type'] = 'application/x-www-form-urlencoded';
        try {
            $response = $this->clients->request(
                'DELETE',
                $this->base_url . '/' . $this->service_name . '/' . $feature,
                [
                    'headers' => $this->headers,
                    'json' => $data,
                ]
            )->getBody()->getContents();

            $result = $this->responseV2Antrol($response);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
			if ($e->getCode() == 0) {
				$handlerContext = $e->getHandlerContext();
				$result = [
					'metaData' => [
						'code' => $handlerContext['errno'],
						'message' => $handlerContext['error']
					]
				];
			} else
				$result = [
					'metaData' => [
						'code' => $e->getCode(),
						'message' => $e->getMessage()
					]
				];
		}
        return $result;
    }

}
