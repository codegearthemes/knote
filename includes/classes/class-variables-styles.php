<?php
/**
 * Styles Variables
 *
 * @package Knote
 */

 if ( ! class_exists( 'Knote_Styles' ) ) {

    class Knote_Styles{

      public static function dimensions_variables( $setting = '', $variable = '', $component = 'builder', $defaults = '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }' ){

         $styles = array();
         $devices = array('desktop', 'tablet', 'mobile' );

         foreach ( $devices as $device ){

            $mod_val = json_decode( get_theme_mod( $setting.'_'.$device, $defaults ) );


            $mod_val->top    = $mod_val->top    === '' ? 0 : $mod_val->top;
            $mod_val->right  = $mod_val->right  === '' ? 0 : $mod_val->right;
            $mod_val->bottom = $mod_val->bottom === '' ? 0 : $mod_val->bottom;
            $mod_val->left   = $mod_val->left   === '' ? 0 : $mod_val->left;

            if( $mod_val->top == 0 && $mod_val->bottom == 0 && $mod_val->right == 0 && $mod_val->left == 0){
               $styles[] = '--theme--'.$component.'-'.$variable.'-'.$device.':'.$mod_val->top.$mod_val->unit;
            }elseif( $mod_val->top == $mod_val->bottom && $mod_val->right == $mod_val->left){
               $styles[] = '--theme--'.$component.'-'.$variable.'-'.$device.':'.$mod_val->top.$mod_val->unit.' '.$mod_val->right.$mod_val->unit;
            }else{
               $styles[] = '--theme--'.$component.'-'.$variable.'-'.$device.':'.$mod_val->top.$mod_val->unit.' '.$mod_val->right.$mod_val->unit.' '.$mod_val->bottom.$mod_val->unit.' '.$mod_val->left.$mod_val->unit;
            }
         }

         return $styles;

      }

      public static function spacing_variables( $setting = '', $css_variable = '', $defaults = '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }' ){

         $styles = array();
         $devices = array('desktop', 'tablet', 'mobile' );

         foreach ( $devices as $device ){

            $mod_val = json_decode( get_theme_mod( $setting.'_'.$device, $defaults ) );


            $mod_val->top    = $mod_val->top    === '' ? 0 : $mod_val->top;
            $mod_val->right  = $mod_val->right  === '' ? 0 : $mod_val->right;
            $mod_val->bottom = $mod_val->bottom === '' ? 0 : $mod_val->bottom;
            $mod_val->left   = $mod_val->left   === '' ? 0 : $mod_val->left;

            if( $mod_val->top == 0 && $mod_val->bottom == 0 && $mod_val->right == 0 && $mod_val->left == 0){
               $styles[] = $css_variable.'-'.$device.':'.$mod_val->top.$mod_val->unit;
            }elseif( $mod_val->top == $mod_val->bottom && $mod_val->right == $mod_val->left){
               $styles[] = $css_variable.'-'.$device.':'.$mod_val->top.$mod_val->unit.' '.$mod_val->right.$mod_val->unit;
            }else{
               $styles[] = $css_variable.'-'.$device.':'.$mod_val->top.$mod_val->unit.' '.$mod_val->right.$mod_val->unit.' '.$mod_val->bottom.$mod_val->unit.' '.$mod_val->left.$mod_val->unit;
            }
         }

         return $styles;

      }

    }
 }
