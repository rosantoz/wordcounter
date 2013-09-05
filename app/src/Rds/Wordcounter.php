<?php

/**
 * Word Counter Class
 *
 * PHP version 5.3.24
 *
 * @category App
 * @package  Rds
 * @author   Rodrigo dos Santos <email@rodrigodossantos.ws>
 * @license  http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link     https://github.com/rosantoz
 */

namespace Rds;

/**
 * Abstract Base Model
 *
 * @category App
 * @package  Rds
 * @author   Rodrigo dos Santos <email@rodrigodossantos.ws>
 * @license  http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link     https://github.com/rosantoz
 */
class Wordcounter
{

    /**
     * Retrieves the HTML content from a URL
     *
     * @param string $url URL
     *
     * @return array 0 => HTTP Response Code, 1 => HTML
     */
    protected function getContent($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        ob_start();
        curl_exec($ch);
        $response = ob_get_contents();
        ob_end_clean();

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return array($httpCode, $response);
    }

    /**
     * Parses the HTML and returns the body tag content
     *
     * @param string $html HTML to be parsed
     *
     * @return string
     */
    public function parseBody($html)
    {
        libxml_use_internal_errors(true);
        $doc = new \DOMDocument();
        $doc->loadHTML($html);
        $doc->preserveWhiteSpace = false;

        $body = $doc->getElementsByTagName('body')->item(0)->nodeValue;

        return strip_tags($body);

    }

    /**
     * Counts the number of words that is displayed on a web page
     *
     * @param string $url Page URL
     *
     * @return mixed
     */
    public function countWords($url)
    {
        $response = $this->getContent($url);

        if ($response[0] != '200') {
            return $response[0];
        }

        $bodyText = $this->parseBody($response[1]);

        return str_word_count($bodyText);
    }
}