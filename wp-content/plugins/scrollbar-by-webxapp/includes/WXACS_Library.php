<?php
if (!defined( 'ABSPATH' )) exit;
class WXACS_Library {

    public static function validate_hex_color($data){
        $return_data = sanitize_hex_color($data);
        return $return_data;
    }
    public static function validate_number($data){
        return intval($data);
    }
    public static function validate_string($data){
        $return_data = sanitize_text_field($data);
        return $return_data;
    }

}