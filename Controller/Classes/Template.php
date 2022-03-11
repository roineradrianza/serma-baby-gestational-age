<?php

/**
 * Template Controller
 *
 *
 * @version 1.0.0
 * @author roineradrianza
 *
 *
 */

class SERMA_BABY_GESTATIONAL_AGE_TEMPLATE
{

    public static function load_template($template_name, $serma_baby_gestational_age_vars = [])
    {
        ob_start();
        extract($serma_baby_gestational_age_vars);
        include self::locate_template($template_name, $serma_baby_gestational_age_vars);
        return apply_filters("serma_baby_gender_age_gestational{$template_name}", ob_get_clean(), $serma_baby_gestational_age_vars);
    }

    public static function show_template($template_name, $serma_baby_gestational_age_vars = [])
    {
        return self::load_template($template_name, $serma_baby_gestational_age_vars);
    }

    public static function locate_template($template_name, $serma_baby_gestational_age_vars = [])
    {
        $template_name = '/Views/' . $template_name . '.php';
        $template_name = apply_filters('serma_baby_gestational_age_template_name', $template_name, $serma_baby_gestational_age_vars);
        $template = apply_filters('serma_baby_gestational_age_template_file', SERMA_BABY_GESTATIONAL_AGE, $template_name) . $template_name;

        return (locate_template($template_name)) ? locate_template($template_name) : $template;

    }
    
    public static function render_view($styles = [], $scripts = [], $template = '', $vars = [])
    {
        foreach ($styles as $style) {
            serma_baby_gestational_age_register_style($style);
        }
        foreach ($scripts as $script) {
            serma_baby_gestational_age_register_script($script);
        }
        return self::show_template($template, $vars);
    }

}
