<?php

/*
 *   SEOBudd WordPress Plugin 
 *   Copyright (C) 2012 Easton Elliott
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License along
 *   with this program; if not, write to the Free Software Foundation, Inc.,
 *   51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *   
 *   This code contains code which is licensed under the Creative Commons Attribution 3.0 Licence GNU General Public License. 
 *   See the classes/ directory to read the licenses.
 * 
 * 
 */

class Seobudd {

    /**
     * SEOBudd version
     * @var string
     */
    protected $seobudd_version = '2.0';

    /**
     * Plugin URL
     * @var string 
     */
    protected $pluginUrl;

    /**
     * Relative path to plugin
     * @var string 
     */
    protected $pluginPath;

    public function __construct() {

        add_action('admin_menu', array($this, 'registerMenuPage'));

        $this->pluginPath = dirname(__FILE__);

        //Set Plugin URL  
        $this->pluginUrl = WP_PLUGIN_URL . '/seobudd';
    }

    /**
     * Add menus to WordPress
     */
    public function registerMenuPage() {
        add_menu_page('SEOBudd', 'SEOBudd', 'delete_posts', 'seobudd', array($this, 'showHome'), $this->pluginUrl . '/images/menu_logo_small.png');

        add_submenu_page('seobudd', 'Check stats', 'Check stats', 'delete_posts', 'seobudd/checkstats.php', false);
        add_submenu_page('seobudd', 'Keyword density', 'Keyword density', 'delete_posts', 'seobudd/keyworddensity.php', false);
    }

    /**
     * Display main SEOBudd page 
     */
    public function showHome() {
        echo '<div class=\'wrap\'><img src="' . $this->pluginUrl . '/images/logo.png"><h4>SEOBudd version ' . $this->seobudd_version . '</h3>
            <p>SEOBudd is an all-in-one SEO WordPress plugin that allows you to have insight into your website\'s workings. <br>
            Use the <b>Check stats</b> to view the number of social media mentions and keyword search visits.<br>
            The <b>Keyword density</b> page is used to check your current keyword density precentages. You can also view other website\'s keyword densities.</p>
            <hr><h4>Support</h4><p>If problems arise in SEOBudd or something isn\'t working as it should, email me at easton (at) geekness.eu or use the <a href="http://geekness.eu/contact" class="button-secondary" title="Contact form">contact form</a></p></div>';
    }

}

