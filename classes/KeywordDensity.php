<?php
/**
 *Keyword density
 * 
 * @author Easton Elliott <easton@geekness.eu>
 * @license GPLv2 
 */
class KeywordDensity extends Seobudd {

    public function __construct() {
        require_once 'KeywordDensityChecker/KeywordDensityChecker.php';
        require_once 'html2text/html2text.php';
    }

    public function getDensity($site_url) {

        $keyword_density = new KeywordDensityChecker();

        //Get keyword density and return result
        $keyword_density->domain = $site_url;
        return $keyword_density->result();
    }

}