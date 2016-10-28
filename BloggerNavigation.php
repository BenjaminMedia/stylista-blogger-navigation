<?php

class BloggerNavigation
{
    var $bloggers = array(
        array(
            'name' => 'Sarah Louise',
            'link' => 'http://sarahlouise.dk'
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
            'name' => 'Miss Jeanett',
            'link' => 'http://missjeanett.dk'
        ),
        array(
            'name' => 'Simply Fit',
            'link' => 'http://simplyfit.dk/'
        )
    );

    function __construct(){

    }

    function navigation_builder(){
        $navigation =

        '<div class="bonnier-wrapper stylista-blogger-menu">
            <div class="container menu-container">
                <div class="menu-horizontal-dropdown">
                    <nav>
                        <ul class="menu-desktop menu-desktop-subnav">';

                            foreach ($this->bloggers as $blog) {
                                $navigation .= "<li><a href='" . $blog['link'] . "' target='_blank' title='" . $blog['name'] . "'>" . $blog['name'] . "</a></li>";
                            }

        $navigation .=
                        '</ul>
                    </nav>
                </div>
            </div>
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
