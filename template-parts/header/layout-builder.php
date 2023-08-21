<?php
/**
 *
 * Header Layout Builder
 *
 * @author      CodeGearThemes
 * @category    WordPress
 * @package     knote
 * @version     0.1.0
 *
 */

?>

<?php

$row                    = $args[ 'row' ];
$device                 = $args[ 'device' ];
$row_data               = $args[ 'row_data' ];

$component_args = array(
	'device'       => $device,
    'builder_type' => 'header'
);

$knote_builder = Knote_Builder::get_instance();

// Get columns number
$cols_number = $knote_builder->get_row_number_of_columns( $row_data->$device );

foreach( $row_data->$device as $col_id => $elements ) :

	$default = 'flex-start';
	$column_classes = array();

	$style_variable = str_replace('_', '-', $row );
	// Get customizer column options.
	$column_option_id     = 'knote_builder_' . $row . '_column' . ( $col_id + 1 );
	$inner_layout         = get_theme_mod( $column_option_id . '_inner_layout_desktop', 'inline' );

	$vertical_alignment   = get_theme_mod( $column_option_id . '_vertical_alignment_'.$device, 'flex-align-center' );

	$column_index = $col_id + 1;
	if( $column_index == $cols_number ){
		$default = 'flex-end';
	}elseif( $column_index == 2 ){
		$default = 'flex-center';
	}

	$horizontal_alignment = get_theme_mod( $column_option_id . '_horizontal_alignment_'.$device, $default );

	if( $inner_layout === 'stack' ){
		$vertical_alignment = str_replace( '-align', '', $horizontal_alignment );
		$horizontal_alignment = str_replace( '-', '-align-', $horizontal_alignment );
	}

	$styles 	= array();
	$margin 	= Knote_Styles::dimensions_variables( $column_option_id.'_margin', 'margin', $style_variable.'-column'.$column_index );
	$padding 	= Knote_Styles::dimensions_variables( $column_option_id.'_padding', 'padding', $style_variable.'-column'.$column_index );
	if( $device == 'desktop' ){
		$spacing_desktop 	= get_theme_mod( $column_option_id.'_elements_spacing_desktop', 15).'px';
		$styles[] = '--theme--'.$style_variable.'-column'.$column_index.'-'.$device.'-spacing:'.$spacing_desktop;
	}else{
		$spacing_tablet 	= get_theme_mod( $column_option_id.'_elements_spacing_tablet', 15).'px';
		$spacing_mobile 	= get_theme_mod( $column_option_id.'_elements_spacing_mobile', 15).'px';

		$styles[] = '--theme--'.$style_variable.'-column'.$column_index.'-tablet-spacing:'.$spacing_tablet;
		$styles[] = '--theme--'.$style_variable.'-column'.$column_index.'-mobile-spacing:'.$spacing_mobile;
	}

	if ( is_array( $margin ) ){
		$styles = array_merge( $styles, $margin );
	}

	if ( is_array( $padding ) ){
		$styles = array_merge( $styles, $padding );
	}

	// Column class.
	$column_classes[] = 'grid__item';

	$column_classes[] = 'builder-column';
	$column_classes[] = $inner_layout;
	$column_classes[] = $vertical_alignment;
	$column_classes[] = $horizontal_alignment;
	$column_classes[] = 'builder-column-' . esc_attr( $col_id + 1 );

	?>

	<div class="<?php echo implode( ' ', $column_classes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"
				style="<?php echo esc_attr( implode(';', $styles ) ); ?>">
		<?php foreach( $elements as $component_callback ) {
			if( method_exists( $knote_builder, $component_callback  ) ) {
				call_user_func( array( $knote_builder, $component_callback ), $component_args );
			}
		} ?>
	</div>

	<?php
endforeach;

