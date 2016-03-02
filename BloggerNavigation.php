<?php

class BloggerNavigation
{
    var $bloggers = array(
        array(
            'name' => 'Twinpeaks',
            'link' => 'http://twinpeaks.dk'
        ),
        array(
            'name' => 'Acie',
            'link' => 'http://acie.dk'
        ),
        array(
            'name' => 'Rockpaperdresses',
            'link' => 'http://rockpaperdresses.dk'
        ),
        array(
            'name' => 'Lily Silwer',
            'link' => 'http://lilysilwer.com'
        )
    );

    function __construct(){

    }

    function navigation_builder(){
        $navigation =

        '<div class="container menu-desktop-subnav stylista-blogger-menu">
        <ul>';

        foreach ($this->bloggers as $blog) {
            $navigation .= "<li><a href='" . $blog['link'] . "' target='_blank' title='" . $blog['name'] . "'>" . $blog['name'] . "</a></li>";
        }

        $navigation .= '</ul>
        </div>';
        
        echo  $navigation;
    }


    function navigation_style()
    {
        wp_enqueue_style('stylista-navigation', plugin_dir_url(__FILE__) . 'style.css', array(), 1.0, 'all');
    }

    function run()
    {
        add_action('wp_enqueue_scripts', array($this, 'navigation_style'));

        add_action('wp_head', array($this,'navigation_builder'), 500);
    }
}
