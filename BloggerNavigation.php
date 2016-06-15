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
            'name' => 'Miriams Blok',
            'link' => 'http://www.miriamsblok.dk'
        ),
        array(
            'name' => 'Miss Jeanett',
            'link' => 'http://missjeanett.dk'
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

    function addNavigationBanner(){
        $script = "<script>
            $('.container.header-container .row').append('<div class=\"col-sm-5 hidden-xs gutter-top responsive-images\" data-banner-md-lg=\"\"><div class=\"pull-right abo-banner text-center\"<div class=\"banner-min-height banner gtm-banner\" id=\"abo-banner\" data-banner-code=\"\" data-banner-target=\"false\" id=\"banner-687151212\"></div></div></div>');
            EAS_load_fif('abo-banner', '".get_home_url()."/emediate/EAS_fif.html', 'http://eas4.emediate.eu/eas?cu=46602;cre=mu;js=y;', 0, 0);
        </script>";
        echo $script;
    }

    function run()
    {
        add_action('wp_enqueue_scripts', array($this, 'navigation_style'));

        add_action('wp_head', array($this,'navigation_builder'), 500);
        add_action('wp_footer', array($this,'addNavigationBanner'), 500);
    }
}
