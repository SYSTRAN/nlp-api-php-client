<?php
require_once(__DIR__ . '/../autoload.php');
require_once(__DIR__ . '/../lib/nlpApi/LidApi.php');
require_once(__DIR__ . '/../lib/nlpApi/MorphologyApi.php');
foreach (glob(__DIR__ . "/../lib/Model/*.php") as $filename)
{
    require_once $filename;
}
class MorphologyApiTest extends PHPUnit_Framework_TestCase
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


    public function testMorphologySupportedLanguagesGet()
    {
        $morphology_api = new \Systran\Client\MorphologyApi($this->api_client);
        $this->assertNotNull($morphology_api->nlpMorphologySupportedLanguagesGet());
    }

    public function testMorphologyExtractLemmaPost()
    {
        $morphology_api = new \Systran\Client\MorphologyApi($this->api_client);
        $this->assertNotNull($morphology_api->nlpMorphologyExtractLemmaPost("en", "exemple"));
    }
    public function testMorphologyExtractLemmaPostFile()
    {
        $input_file = new SplFileObject(__DIR__ . '/test.txt');
        $morphology_api = new \Systran\Client\MorphologyApi($this->api_client);
        $this->assertNotNull($morphology_api->nlpMorphologyExtractLemmaPost("en", null, $input_file));
    }
    public function testMorphologyExtractNpPost()
    {
        $morphology_api = new \Systran\Client\MorphologyApi($this->api_client);
        $this->assertNotNull($morphology_api->nlpMorphologyExtractNpPost("en", "exemple"));
    }
    public function testMorphologyExtractPosPost()
    {
        $morphology_api = new \Systran\Client\MorphologyApi($this->api_client);
        $this->assertNotNull($morphology_api->nlpMorphologyExtractPosPost("en", "exemple"));
    }
    public function testMorphologyExtractNpPostFile()
    {
        $input_file = new SplFileObject(__DIR__ . '/test.txt');
        $morphology_api = new \Systran\Client\MorphologyApi($this->api_client);
        $this->assertNotNull($morphology_api->nlpMorphologyExtractNpPost("en", null, $input_file)->getChunks());
    }
    public function testMorphologyExtractPosPostFile()
    {
        $input_file = new SplFileObject(__DIR__ . '/test.txt');
        $morphology_api = new \Systran\Client\MorphologyApi($this->api_client);
        $this->assertNotNull($morphology_api->nlpMorphologyExtractPosPost("en", null, $input_file)->getPartsOfSpeech());
    }

}
