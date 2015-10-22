<?php
/**
 * TranscriptionApi
 * PHP version 5
 *
 * @category Class
 * @package  Systran\Client
 * @author   http://github.com/Systran-api/Systran-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
/**
 *  Copyright 2015 SmartBear Software
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

/**
 *
 *
 * Do not edit the class manually.
 */

namespace Systran\Client;

use \Systran\Client\Configuration;
use \Systran\Client\ApiClient;
use \Systran\Client\ApiException;
use \Systran\Client\ObjectSerializer;

/**
 * TranscriptionApi Class Doc Comment
 *
 * @category Class
 * @package  Systran\Client
 * @author   http://github.com/Systran-api/Systran-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class TranscriptionApi
{

    /**
     * API Client
     * @var \Systran\Client\ApiClient instance of the ApiClient
     */
    protected $apiClient;
  
    /**
     * Constructor
     * @param \Systran\Client\ApiClient|null $apiClient The api client to use
     */
    function __construct($apiClient = null)
    {
        if ($apiClient == null) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost('https://localhost:8202');
        }
  
        $this->apiClient = $apiClient;
    }
  
    /**
     * Get API client
     * @return \Systran\Client\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }
  
    /**
     * Set the API client
     * @param \Systran\Client\ApiClient $apiClient set the API client
     * @return TranscriptionApi
     */
    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }
  
    
    /**
     * nlpTranscriptionSupportedLanguagesGet
     *
     * Supported Languages
     *
     * @param string $source Source Language code ([details](#description_langage_code_values)) (optional)
     * @param string $target Target Language code ([details](#description_langage_code_values)) (optional)
     * @param string $callback Javascript callback function name for JSONP Support (optional)
     * @return \Systran\Client\TranscriptionSupportedLanguagesResponse
     * @throws \Systran\Client\ApiException on non-2xx response
     */
    public function nlpTranscriptionSupportedLanguagesGet($source=null, $target=null, $callback=null)
    {
        
  
        // parse inputs
        $resourcePath = "/nlp/transcription/supportedLanguages";
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        $method = "GET";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array());
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array());
  
        // query params
        if ($source !== null) {
            $queryParams['source'] = $this->apiClient->getSerializer()->toQueryValue($source);
        }// query params
        if ($target !== null) {
            $queryParams['target'] = $this->apiClient->getSerializer()->toQueryValue($target);
        }// query params
        if ($callback !== null) {
            $queryParams['callback'] = $this->apiClient->getSerializer()->toQueryValue($callback);
        }
        
        
        
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } else if (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        $apiKey = $this->apiClient->getApiKeyWithPrefix('Authorization');
        if (isset($apiKey)) {
            $headerParams['Authorization'] = $apiKey;
        }
        
        
        
        $apiKey = $this->apiClient->getApiKeyWithPrefix('key');
        if (isset($apiKey)) {
            $queryParams['key'] = $apiKey;
        }
        
        
        
        // make the API Call
        try
        {
            list($response, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\Systran\Client\TranscriptionSupportedLanguagesResponse'
            );
            
            if (!$response) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize($response, '\Systran\Client\TranscriptionSupportedLanguagesResponse', $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Systran\Client\TranscriptionSupportedLanguagesResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
        
        return null;
        
    }
    
    /**
     * nlpTranscriptionTranscribePost
     *
     * Transcribe
     *
     * @param string $source Source Language code ([details](#description_langage_code_values)) (required)
     * @param string $target Target Language code ([details](#description_langage_code_values)) (required)
     * @param \SplFileObject $input_file input text\n\n**Either `input` or `inputFile` is required** (optional)
     * @param string $input input text\n\n**Either `input` or `inputFile` is required** (optional)
     * @param int $profile Profile id (optional)
     * @param string $callback Javascript callback function name for JSONP Support (optional)
     * @return \SplFileObject
     * @throws \Systran\Client\ApiException on non-2xx response
     */
    public function nlpTranscriptionTranscribePost($source, $target, $input_file=null, $input=null, $profile=null, $callback=null)
    {
        
        // verify the required parameter 'source' is set
        if ($source === null) {
            throw new \InvalidArgumentException('Missing the required parameter $source when calling nlpTranscriptionTranscribePost');
        }
        // verify the required parameter 'target' is set
        if ($target === null) {
            throw new \InvalidArgumentException('Missing the required parameter $target when calling nlpTranscriptionTranscribePost');
        }
  
        // parse inputs
        $resourcePath = "/nlp/transcription/transcribe";
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        $method = "POST";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('text/plain'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('*/*','application/x-www-form-urlencoded','*/*'));
  
        // query params
        if ($input !== null) {
            $queryParams['input'] = $this->apiClient->getSerializer()->toQueryValue($input);
        }// query params
        if ($source !== null) {
            $queryParams['source'] = $this->apiClient->getSerializer()->toQueryValue($source);
        }// query params
        if ($target !== null) {
            $queryParams['target'] = $this->apiClient->getSerializer()->toQueryValue($target);
        }// query params
        if ($profile !== null) {
            $queryParams['profile'] = $this->apiClient->getSerializer()->toQueryValue($profile);
        }// query params
        if ($callback !== null) {
            $queryParams['callback'] = $this->apiClient->getSerializer()->toQueryValue($callback);
        }
        
        
        // form params
        if ($input_file !== null) {
            if (function_exists('curl_file_create')) {
                $formParams['inputFile'] = new \CurlFile($input_file->getRealPath(), "text/plain", "test.txt");
            }
            else
                $formParams['inputFile'] = '@' . $this->apiClient->getSerializer()->toFormValue($input_file);
            $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('multipart/form-data','application/x-www-form-urlencoded','*/*'));

        }
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } else if (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        $apiKey = $this->apiClient->getApiKeyWithPrefix('Authorization');
        if (isset($apiKey)) {
            $headerParams['Authorization'] = $apiKey;
        }
        
        
        
        $apiKey = $this->apiClient->getApiKeyWithPrefix('key');
        if (isset($apiKey)) {
            $queryParams['key'] = $apiKey;
        }
        
        
        
        // make the API Call
        try
        {
            list($response, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\SplFileObject'
            );
            
            if (!$response) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize($response, '\SplFileObject', $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
        
        return null;
        
    }
    
}
