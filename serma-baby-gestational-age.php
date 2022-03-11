<?php
/*
Plugin Name: Calculadora de Edad Gestacional - Ser Madre
Description: Este plugin muestra un formulario para calcular la edad gestacional. Utilice el shortcode [serma-baby-gestational-age-wp]
Version: 1.0.0
Requires at least: 5.1
Requires PHP: 7.2
Author: Ser Madre
Developer: Roiner Adrianza
Author URI: http://sermadre.com
License: GPL v3
*/

if (!defined('ABSPATH')) {
    exit;
}
//Exit if accessed directly

define('SERMA_BABY_GESTATIONAL_AGE_FILE', __FILE__);
define('SERMA_BABY_GESTATIONAL_AGE', dirname(SERMA_BABY_GESTATIONAL_AGE_FILE));
define('SERMA_BABY_GESTATIONAL_AGE_URL', plugin_dir_url(SERMA_BABY_GESTATIONAL_AGE_FILE));
define('SERMA_BABY_GESTATIONAL_AGE_DB_VERSION', '1.0');
define('SERMA_BABY_GESTATIONAL_AGE_VERSION', '1.0.0');

define('SERMA_BABY_GESTATIONAL_AGE_ENV', false);

if (SERMA_BABY_GESTATIONAL_AGE_ENV) {
    @ini_set('display_errors', 1);
}

require_once SERMA_BABY_GESTATIONAL_AGE . "/Controller/Main.php";
