<?php
require_once(__DIR__ . '/../autoload.php');
require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/../lib/nlpApi/NerApi.php');
foreach (glob(__DIR__ . "/../lib/Model/*.php") as $filename)
{
    require_once $filename;
}
class NerApiTest extends PHPUnit_Framework_TestCase
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

    public function testNerSupportedLanguagesGet()
    {
        $ner_api = new \Systran\Client\NerApi($this->api_client);
        $this->assertNotNull($ner_api->nlpNerSupportedLanguagesGet());
    }

    public function testNerExtractAnnotationsPost()
    {
        $ner_api = new \Systran\Client\NerApi($this->api_client);
        $this->assertNotNull($ner_api->nlpNerExtractAnnotationsPost("en", null, "test"));
    }

    public function testNerExtractEntitiesPost()
    {
        $ner_api = new \Systran\Client\NerApi($this->api_client);
        $this->assertNotNull($ner_api->nlpNerExtractEntitiesPost("en", null, "test"));
    }


    public function testNerExtractAnnotationsPostFile()
    {
        $input_file = new SplFileObject(__DIR__ . '/test.txt');
        $ner_api = new \Systran\Client\NerApi($this->api_client);
        $this->assertNotNull($ner_api->nlpNerExtractAnnotationsPost("en", $input_file));
    }

    public function testNerExtractEntitiesPostFile()
    {
        $input_file = new SplFileObject(__DIR__ . '/test.txt');
        $ner_api = new \Systran\Client\NerApi($this->api_client);
        $this->assertNotNull($ner_api->nlpNerExtractEntitiesPost("en", $input_file));
    }

}
