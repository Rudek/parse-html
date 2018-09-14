<?php

require_once('vendor/autoload.php');


try {
    $parseHTML = new ParseSPAHtml('https://www.hemplybalance.se/sv/produkter');
    echo $parseHTML->getTitleText();
    print "\r\n\r\n";

    print_r($parseHTML->getTagTexts('h1'));
    print "\r\n";

    print_r( $parseHTML->getTagTexts('h2'));


} catch (WebDriverException $ex) {
    $msg = $ex->getMessage();
    echo "Exception: [[$msg]]";
}
//===============================================================
