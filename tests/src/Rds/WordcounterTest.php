<?php

namespace tests\Rds;

use Rds\Wordcounter;

/**
 * Class WordcounterTest
 *
 * @todo count words
 * @todo code standards
 * @todo code coverage
 * @todo send
 */
class WordcounterTest extends \PHPUnit_Framework_TestCase
{
    protected $wordCounter;
    protected $sampleUrl;

    public function setUp()
    {
        parent::setUp();

        $this->wordCounter = new Wordcounter;
        $this->sampleUrl   = 'http://redpropaganda.com.au';
    }

    public function sampleHtml1()
    {
        return "<html><head><title>I am a title</title></head><body>Body text</body></html>";
    }

    public function sampleHtml2()
    {
        return "<html><body>Tree words here</body></html>";
    }

    public function sampleHtml3()
    {
        return '<html><body><a href="http://redpropaganda.com.au">This is a link</a></body></html>';
    }


     public function testGetContent()
    {
        $mock = $this->getMock('Wordcounter', array('getContent'));
        $mock->expects($this->once())
        ->method('getContent')
        ->will($this->returnValue(array(200, $this->sampleHtml1())));

        $response = $mock->getContent();

        $this->assertEquals(200, $response[0]);
        $this->assertEquals($this->sampleHtml1(), $response[1]);
    }


    public function testParseBody()
    {
        $body = $this->wordCounter->parseBody($this->sampleHtml1());
        $this->assertEquals('Body text', $body);

        $body = $this->wordCounter->parseBody($this->sampleHtml2());
        $this->assertEquals('Tree words here', $body);

        $body = $this->wordCounter->parseBody($this->sampleHtml3());
        $this->assertEquals('This is a link', $body);
    }

    public function testCountWords()
    {
        $mock = $this->getMock('Wordcounter', array('countWords'));
        $mock->expects($this->once())
        ->method('countWords')
        ->will($this->returnValue(184));

        $words = $mock->countWords($this->sampleUrl);

        $this->assertEquals(184, $words);
    }
}