<?php
require_once(__DIR__ . '/../autoload.php');
require_once(__DIR__ . '/../lib/nlpApi/TranscriptionApi.php');
require_once(__DIR__ . '/../vendor/autoload.php');
foreach (glob(__DIR__ . "/../lib/Model/*.php") as $filename)
{

    require_once $filename;
}
class TranscriptionApiTest extends PHPUnit_Framework_TestCase
{
    var $config;
    var $api_client;

    public function setUp()
    {
        $this->config = new \Systran\Client\Configuration();
        if (!file_exists(__DIR__ . '/../apiKey.txt'))
            throw new Exception('﻿"To properly run the tests, please add an apiKey.txt file containing your api key at the library root folder or edit the test file with your key"');
        $api_key = new SplFileObject(__DIR__ . '/../apiKey.txt');
        $this->config->setApiKey("key",$api_key->fgets());
        $this->config->setHost("https://platform.systran.net:8904");
        if(!$this->config->getApiKey("key"))
            throw new Exception("No api key found, please check your apiKey.txt file");
        $this->api_client = new \Systran\Client\ApiClient($this->config);
    }

    public function testTranscriptionSupportedLanguagesGet()
    {
        $transcriptionApi_api = new \Systran\Client\TranscriptionApi($this->api_client);
        $this->assertNotNull($transcriptionApi_api->nlpTranscriptionSupportedLanguagesGet());
    }

    public function testTranscriptionTranscribePost()
    {
        $transcriptionApi_api = new \Systran\Client\TranscriptionApi($this->api_client);
        $this->assertNotNull($transcriptionApi_api->nlpTranscriptionTranscribePost("en", "ru", null, "hello"));
    }

    public function testTranscriptionTranscribePostFile()
    {
        $input_file = new SplFileObject(__DIR__ . '/test.txt');
        $transcriptionApi_api = new \Systran\Client\TranscriptionApi($this->api_client);
        $this->assertNotNull($transcriptionApi_api->nlpTranscriptionTranscribePost("en", "ru", $input_file));
    }
}
