<?php

/**
 * Check stats 
 * 
 * @author Easton Elliott <easton@geekness.eu>
 * @license GPLv2
 */
class CheckStats extends SeoBudd {

    /**
     * Website URL
     * @var string 
     */
    public $site_url;

    public function __construct() {

        require_once 'SEOstats/src/class.seostats.php';

        $this->site_url = site_url();
    }

    /**
     * Display all SEO stats 
     */
    public function getStats() {
        try {

            $this->stats = new SEOstats($this->site_url);
            return $this->stats;
        } catch (SEOstatsException $e) {
            echo ($e->getMessage());
        }
    }

    public function getAlexaStats() {
        try {

            $this->alexa_stats = $this->stats->Alexa();

            return $this->alexa_stats;
        } catch (SEOstatsException $e) {
            echo ($e->getMessage());
        }
    }

}
