<?php
/*
Plugin Name: WP demo plugin
Plugin URI: https://github.com/LoicEsk/wp-demo-plugin
Description: Exemple de plugin Wordpres
Version: 1.0.0
Author: Loïc Laurent
Author URI: https://www.loiclaurent.com
Text Domain: datalizer
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


if(!class_exists('WpDemoPlugin')) {
    class WpDemoPlugin {
        function __construct() {
            // ajout des hooks pour les requetes ajax
            add_action( 'wp_ajax_get_header', [ $this, 'getHeader' ] ); // hook pour l'admin
            add_action( 'wp_ajax_nopriv_get_header', [ $this, 'getHeader' ] ); // hook pour l'accès public

            // ajout du JS de démo
            add_action( 'wp_enqueue_scripts', [ $this, 'enqueueScripts' ] );
        }

        function getHeader() {

            // ici, le header
            get_header();
            // mais on peux y mettre ce que l'on veut

            wp_die();
        }

        function enqueueScripts() {
            wp_enqueue_script( 'ajax-demo', plugins_url( 'js/demo-ajax.js', __FILE__ ), [ 'jquery' ], false, false );
            wp_localize_script( 'ajax-demo', 'ajax_object', [ 'ajax_url' => admin_url( 'admin-ajax.php' ) ] );
        }
    }
}

new WpDemoPlugin;