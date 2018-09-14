<?php


use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class ParseSPAHtml
{
    private const SELENIUM_SERVER = 'http://localhost:4444/wd/hub';
    private $driver;

    /**
     * ParseSPAHtml constructor. Create webdriver and open browser window.
     * @param $url
     */
    public function __construct($url)
    {
        $this->driver = RemoteWebDriver::create(self::SELENIUM_SERVER, DesiredCapabilities::chrome() , 5000, 30000);
        $this->driver->get($url);
    }

    /**
     * Method get title of current page.
     * @return string title of page.
     */
    public function getTitleText() {
        return $this->driver->getTitle();
    }

    /**
     * Return array of internal text of all tag given as parameter.
     * @param $tag - name of tag.
     * @return array tag's text.
     */
    public function getTagTexts($tag) {
        $tags = $this->driver->findElements(WebDriverBy::tagName($tag));
        $array_texts = array();
        foreach( $tags as $tag) {
            $array_texts[] = $tag->getText();
        }
        return $array_texts;
    }

    public function __destruct()
    {
        $this->driver->quit();
    }

}