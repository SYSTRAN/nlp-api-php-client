<?php
require_once(__DIR__ . '/../autoload.php');
require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/../lib/nlpApi/SegmentationApi.php');
foreach (glob(__DIR__ . "/../lib/Model/*.php") as $filename)
{
    require_once $filename;
}
class SegmentationApiTest extends PHPUnit_Framework_TestCase
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

    public function testSegmentationSegmentAndTokenizePost()
    {
        $segmentation_api = new \Systran\Client\SegmentationApi($this->api_client);
        $this->assertNotNull($segmentation_api->nlpSegmentationSegmentAndTokenizePost("en", null, "test"));
    }

    public function testSegmentationSupportedLanguagesGet()
    {
        $segmentation_api = new \Systran\Client\SegmentationApi($this->api_client);
        $this->assertNotNull($segmentation_api->nlpSegmentationSupportedLanguagesGet());
    }

    public function testSegmentationSegmentPost()
    {
        $segmentation_api = new \Systran\Client\SegmentationApi($this->api_client);
        $this->assertNotNull($segmentation_api->nlpSegmentationSegmentPost("en", null, "test"));
    }

    public function testSegmentationTokenizePost()
    {
        $segmentation_api = new \Systran\Client\SegmentationApi($this->api_client);
        $this->assertNotNull($segmentation_api->nlpSegmentationTokenizePost("en", null, "test"));
    }

    public function testSegmentationSegmentAndTokenizePostTest()
    {
        $input_file = new SplFileObject(__DIR__ . '/test.txt');
        $segmentation_api = new \Systran\Client\SegmentationApi($this->api_client);
        $this->assertNotNull($segmentation_api->nlpSegmentationSegmentAndTokenizePost("en", $input_file));
    }

    public function testSegmentationSegmentPostTest()
    {
        $input_file = new SplFileObject(__DIR__ . '/test.txt');
        $segmentation_api = new \Systran\Client\SegmentationApi($this->api_client);
        $this->assertNotNull($segmentation_api->nlpSegmentationSegmentPost("en", $input_file));
    }

    public function testSegmentationTokenizePostTest()
    {
        $input_file = new SplFileObject(__DIR__ . '/test.txt');
        $segmentation_api = new \Systran\Client\SegmentationApi($this->api_client);
        $this->assertNotNull($segmentation_api->nlpSegmentationTokenizePost("en", $input_file));
    }
}
