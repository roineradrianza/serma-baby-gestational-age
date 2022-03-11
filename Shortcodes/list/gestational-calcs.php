<?php

new SERMA_BABY_AGE_GESTATIONAL_CALC_SHORTCODE();

class SERMA_BABY_AGE_GESTATIONAL_CALC_SHORTCODE
{

    public function __construct()
    {
        add_shortcode('serma-baby-gestational-age-wp', array($this, 'gestational_age'));
    }

    public function gestational_age($attrs = [])
    {

        if (!is_admin()) {
           
            wp_register_style( 'serma-random-name-generator-core-cookie-font', "https://fonts.googleapis.com/css2?family=Cookie&display=swap", '' );
            wp_register_style( 'serma-random-name-generator-core-inter-font', "https://fonts.googleapis.com/css2?family=Inter:wght@500;700;800;900&display=swap", '' );

            wp_enqueue_style( 'serma-random-name-generator-core-inter-font' );
            wp_enqueue_style( 'serma-random-name-generator-core-cookie-font' );

            wp_register_script( 'moment', SERMA_BABY_GESTATIONAL_AGE_URL . "assets/js/lib/moment.min.js", [], '2.29.1', true );
            wp_register_script( 'tailwind-css', "https://cdn.tailwindcss.com", [], '3.0.12', false );
            wp_register_script( 'tailwind-flowbite', "https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js", 'tailwind-css', '1.3.0', false );

            wp_enqueue_script( 'moment' );
            wp_enqueue_script( 'tailwind-css' );
            wp_enqueue_script( 'tailwind-flowbite' );
            wp_add_inline_script( 'tailwind-css', serma_baby_gestational_age_tailwind_config() );

            $vue_file = SERMA_BABY_GESTATIONAL_AGE_ENV ? 'vue.min' : 'vue.prod.min';

            serma_baby_gestational_age_register_script(
                "lib/$vue_file", 
                ['moment'], 
                false
            );

            switch ($attrs['calc']) {
                case 'gestational_age':
                    return self::gestational_age_template();
                    break;
                
                case 'ultrasound_gestational_age':
                    return self::ultrasound_gestational_age_template();
                    break;
                                
                case 'childbirth_date':
                    return self::childbirth_date_template();
                    break;

                default:
                    # code...
                    break;
            }

            
        }
    }
    
    private static function gestational_age_template() {
        return SERMA_BABY_GESTATIONAL_AGE_TEMPLATE::render_view(
            [], 
            [
                'lib/flowbite/datepicker',
                'gestational-calc'
            ], 
            'gestational-calc'
        );
    }
    
    private static function ultrasound_gestational_age_template() {
        return SERMA_BABY_GESTATIONAL_AGE_TEMPLATE::render_view(
            [], 
            [
                'ultrasound-gestational-age'
            ], 
            'ultrasound-gestational-age'
        );
    }
    
    private static function childbirth_date_template() {
        return SERMA_BABY_GESTATIONAL_AGE_TEMPLATE::render_view(
            [], 
            [
                'lib/flowbite/datepicker',
                'childbirth-date'
            ], 
            'childbirth-date'
        );
    }
}