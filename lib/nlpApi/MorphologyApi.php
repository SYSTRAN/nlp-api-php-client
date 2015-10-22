<?php
/**
 * MorphologyApi
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
 * MorphologyApi Class Doc Comment
 *
 * @category Class
 * @package  Systran\Client
 * @author   http://github.com/Systran-api/Systran-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class MorphologyApi
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
     * @return MorphologyApi
     */
    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }
  
    
    /**
     * nlpMorphologyExtractLemmaPost
     *
     * Get lemma
     *
     * @param string $lang Language code of the input ([details](#description_langage_code_values)) (required)
     * @param string $input input text\n\n**Either `input` or `inputFile` is required** (optional)
     * @param \SplFileObject $input_file input text\n\n**Either `input` or `inputFile` is required** (optional)
     * @param int $profile Profile id (optional)
     * @param string $callback Javascript callback function name for JSONP Support (optional)
     * @return \Systran\Client\MorphologyExtractLemmaResponse
     * @throws \Systran\Client\ApiException on non-2xx response
     */
    public function nlpMorphologyExtractLemmaPost($lang, $input=null, $input_file=null, $profile=null, $callback=null)
    {
        
        // verify the required parameter 'lang' is set
        if ($lang === null) {
            throw new \InvalidArgumentException('Missing the required parameter $lang when calling nlpMorphologyExtractLemmaPost');
        }
  
        // parse inputs
        $resourcePath = "/nlp/morphology/extract/lemma";
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        $method = "POST";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array());
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('*/*','application/x-www-form-urlencoded','*/*'));
  
        // query params
        if ($input !== null) {
            $queryParams['input'] = $this->apiClient->getSerializer()->toQueryValue($input);
        }// query params
        if ($lang !== null) {
            $queryParams['lang'] = $this->apiClient->getSerializer()->toQueryValue($lang);
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
                $headerParams, '\Systran\Client\MorphologyExtractLemmaResponse'
            );
            
            if (!$response) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize($response, '\Systran\Client\MorphologyExtractLemmaResponse', $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Systran\Client\MorphologyExtractLemmaResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
        
        return null;
        
    }
    
    /**
     * nlpMorphologyExtractNpPost
     *
     * Get NP/chunks
     *
     * @param string $lang Language code of the input ([details](#description_langage_code_values)) (required)
     * @param string $input input text\n\n**Either `input` or `inputFile` is required** (optional)
     * @param \SplFileObject $input_file input text\n\n**Either `input` or `inputFile` is required** (optional)
     * @param int $profile Profile id (optional)
     * @param string $callback Javascript callback function name for JSONP Support (optional)
     * @return \Systran\Client\MorphologyExtractNPResponse
     * @throws \Systran\Client\ApiException on non-2xx response
     */
    public function nlpMorphologyExtractNpPost($lang, $input=null, $input_file=null, $profile=null, $callback=null)
    {
        
        // verify the required parameter 'lang' is set
        if ($lang === null) {
            throw new \InvalidArgumentException('Missing the required parameter $lang when calling nlpMorphologyExtractNpPost');
        }
  
        // parse inputs
        $resourcePath = "/nlp/morphology/extract/np";
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        $method = "POST";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array());
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('*/*/form-data','application/x-www-form-urlencoded','*/*'));
  
        // query params
        if ($input !== null) {
            $queryParams['input'] = $this->apiClient->getSerializer()->toQueryValue($input);
        }// query params
        if ($lang !== null) {
            $queryParams['lang'] = $this->apiClient->getSerializer()->toQueryValue($lang);
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
                $headerParams, '\Systran\Client\MorphologyExtractNPResponse'
            );
            
            if (!$response) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize($response, '\Systran\Client\MorphologyExtractNPResponse', $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Systran\Client\MorphologyExtractNPResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
        
        return null;
        
    }
    
    /**
     * nlpMorphologyExtractPosPost
     *
     * Get part of speech
     *
     * @param string $lang Language code of the input ([details](#description_langage_code_values)) (required)
     * @param string $input input text\n\n**Either `input` or `inputFile` is required** (optional)
     * @param \SplFileObject $input_file input text\n\n**Either `input` or `inputFile` is required** (optional)
     * @param int $profile Profile id (optional)
     * @param string $callback Javascript callback function name for JSONP Support (optional)
     * @return \Systran\Client\MorphologyExtractPosResponse
     * @throws \Systran\Client\ApiException on non-2xx response
     */
    public function nlpMorphologyExtractPosPost($lang, $input=null, $input_file=null, $profile=null, $callback=null)
    {
        
        // verify the required parameter 'lang' is set
        if ($lang === null) {
            throw new \InvalidArgumentException('Missing the required parameter $lang when calling nlpMorphologyExtractPosPost');
        }
  
        // parse inputs
        $resourcePath = "/nlp/morphology/extract/pos";
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        $method = "POST";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array());
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('*/*','application/x-www-form-urlencoded','*/*'));
  
        // query params
        if ($input !== null) {
            $queryParams['input'] = $this->apiClient->getSerializer()->toQueryValue($input);
        }// query params
        if ($lang !== null) {
            $queryParams['lang'] = $this->apiClient->getSerializer()->toQueryValue($lang);
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
                $headerParams, '\Systran\Client\MorphologyExtractPosResponse'
            );
            
            if (!$response) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize($response, '\Systran\Client\MorphologyExtractPosResponse', $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Systran\Client\MorphologyExtractPosResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
        
        return null;
        
    }
    
    /**
     * nlpMorphologySupportedLanguagesGet
     *
     * Supported Languages
     *
     * @param string $callback Javascript callback function name for JSONP Support (optional)
     * @return \Systran\Client\SupportedLanguagesResponse
     * @throws \Systran\Client\ApiException on non-2xx response
     */
    public function nlpMorphologySupportedLanguagesGet($callback=null)
    {
        
  
        // parse inputs
        $resourcePath = "/nlp/morphology/supportedLanguages";
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
                $headerParams, '\Systran\Client\SupportedLanguagesResponse'
            );
            
            if (!$response) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize($response, '\Systran\Client\SupportedLanguagesResponse', $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Systran\Client\SupportedLanguagesResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
        
        return null;
        
    }
    
}
