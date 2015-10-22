<?php

require_once(__DIR__ . '/../autoload.php');
require_once(__DIR__ . '/../lib/nlpApi/LidApi.php');

require_once(__DIR__ . '/../vendor/autoload.php');
foreach (glob(__DIR__ . "/../lib/Model/*.php") as $filename)
{
    require_once $filename;
}
class LidApiTest extends PHPUnit_Framework_TestCase
{
    var $config;
    var $api_client;

    public function setUp()
    {
        $this->config = new \Systran\Client\Configuration();
        $api_key = new SplFileObject(__DIR__ . '/../apiKey.txt');
        $this->config->setApiKey("key",$api_key->fgets());
        $this->config->setHost("https://platform.systran.net:8904");
        $this->api_client = new \Systran\Client\ApiClient($this->config);
    }


    public function testLidDetectLanguageDocumentPost()
    {
        $lid_api = new \Systran\Client\LidApi($this->api_client);
        $this->assertNotNull($lid_api->nlpLidDetectLanguageDocumentPost(null, "this is a test"));
    }

    public function testLidDetectLanguageParagraphPost()
    {
        $lid_api = new \Systran\Client\LidApi($this->api_client);
        $this->assertNotNull($lid_api->nlpLidDetectLanguageParagraphPost(null, "this is a test"));
    }

    public function testLidDetectLanguageDocumentPostFile()
    {
        $input_file = new SplFileObject(__DIR__ . '/test.txt');

        $lid_api = new \Systran\Client\LidApi($this->api_client);
        $this->assertNotNull($lid_api->nlpLidDetectLanguageDocumentPost($input_file));
    }

    public function testLidDetectLanguageParagraphPostFile()
    {
        $input_file = new SplFileObject(__DIR__ . '/test.txt');

        $lid_api = new \Systran\Client\LidApi($this->api_client);
        $this->assertNotNull($lid_api->nlpLidDetectLanguageParagraphPost($input_file));
    }
}
