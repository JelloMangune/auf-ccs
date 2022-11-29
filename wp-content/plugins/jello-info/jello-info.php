<?php
/**
 * @package jello-info
 * @version 1.0
 */
/**
 * Plugin Name:  Jello Information
 * Plugin URI:   https://wordpress.org/plugins/jello-info/
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Jello
 */


function getName(){
    return <<<HTML
    <html>
    <body>
    <h1 class="zeever-animate zeever-move-right zeever-delay-3 has-zeever-primary-color has-text-color has-heading-1-font-size zeever-animate-init" style="margin-top:23px;margin-right:0px;font-style:normal;font-weight:700;line-height:1.2;text-transform:capitalize">Jello P. Mangune</h1>
    </body>
    </html>
    HTML;
}

function getProgram(){
    return <<<HTML
    <html>
    <body>
    <h1 class="zeever-animate zeever-move-right zeever-delay-3 has-zeever-primary-color has-text-color has-heading-1-font-size zeever-animate-init" style="margin-top:0px;margin-right:0px;font-style:normal;font-weight:700;line-height:1.2;text-transform:capitalize">BSIT-3A</h1>
    </body>
    </html>
    HTML;
}

function getPicture1(){
    return <<<HTML
    <html>
    <body>
    <img decoding="async" src="http://localhost/wordpress/wp-content/uploads/2022/11/f1.jpg" alt="" class="wp-image-81" style="height:350px;width:320px">
    </body>
    </html>
    HTML;
}

function getPicture2(){
    return <<<HTML
    <html>
    <body>
    <img decoding="async" src="http://localhost/wordpress/wp-content/uploads/2022/11/f2.jpg" alt="" class="wp-image-81" style="height:350px;width:320px">
    </body>
    </html>
    HTML;
}

function getPicture3(){
    return <<<HTML
    <html>
    <body>
    <img decoding="async" src="http://localhost/wordpress/wp-content/uploads/2022/11/f3.jpg" alt="" class="wp-image-81" style="height:350px;width:320px">
    </body>
    </html>
    HTML;
}

function getPicture4(){
    return <<<HTML
    <html>
    <body>
    <img decoding="async" src="http://localhost/wordpress/wp-content/uploads/2022/11/f4.jpg" alt="" class="wp-image-81" style="height:350px;width:320px">
    </body>
    </html>
    HTML;
}

function getBirthdate(){
    return <<<HTML
    <html>
    <body>
    <p class="has-text-align-left has-zeever-bodytext-color has-text-color">March 15, 2002</p>
    </body>
    </html>
    HTML;
}

function getSchool(){
    return <<<HTML
    <html>
    <body>
    <p class="has-text-align-left has-zeever-bodytext-color has-text-color">Angeles University Foundation</p>
    </body>
    </html>
    HTML;
}

function getHobby(){
    return <<<HTML
    <html>
    <body>
    <p class="has-text-align-left has-zeever-bodytext-color has-text-color">Playing League of Legends</p>
    </body>
    </html>
    HTML;
}

function getSpotifyPlaylist(){
    return <<<HTML
    <html>
    <body>
    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/6tlWxf7KgMXBZ0wcxCb5df?utm_source=generator&theme=0" width="100%" height="380" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
    </body>
    </html>
    HTML;
}

function getMovieTrailer(){
    return <<<HTML
    <html>
    <body>
    <figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/AXCTMGYUg9A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div></figure>
    </html>
    HTML;
}

function personal_page_activate(){
    error_log('Personal Page Plugin is now activated');
}

function personal_page_deactivate(){
    error_log('Personal Page Plugin is now deactivated');
}

register_activation_hook( __FILE__, 'personal_page_activate' );
register_deactivation_hook( __FILE__, 'personal_page_deactivate' );
add_shortcode( 'getName', 'getName' );
add_shortcode( 'getProgram', 'getProgram' );
add_shortcode( 'getBirthdate', 'getBirthdate' );
add_shortcode( 'getSchool', 'getSchool' );
add_shortcode( 'getHobby', 'getHobby' );
add_shortcode( 'getPicture1', 'getPicture1' );
add_shortcode( 'getPicture2', 'getPicture2' );
add_shortcode( 'getPicture3', 'getPicture3' );
add_shortcode( 'getPicture4', 'getPicture4' );
add_shortcode( 'getSpotifyPlaylist', 'getSpotifyPlaylist' );
add_shortcode( 'getMovieTrailer', 'getMovieTrailer' );
