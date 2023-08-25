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

$row                    = $args[ 'row' ];
$device                 = $args[ 'device' ];
$row_data               = $args[ 'row_data' ];

$component_args = array(
	'device'       => $device,
    'builder_type' => 'footer'
);


$knote_builder = Knote_Builder::get_instance();
use \KnoteToolkit\Includes\Customizer as KnoteToolkit;

// Get columns number
$cols_number = $knote_builder->get_row_number_of_columns( $row_data->$device );

foreach( $row_data->$device as $col_id => $elements ) :

	$styles = $column_classes = array();
	// Get customizer column options.
	$column_option_id     = 'knote_builder_' . $row . '_column' . ( $col_id + 1 );
	$inner_layout         = get_theme_mod( $column_option_id . '_inner_layout_desktop', 'inline' );
	$inner_layout_tablet  = get_theme_mod( $column_option_id . '_inner_layout_tablet', 'inline' );
	$inner_layout_mobile  = get_theme_mod( $column_option_id . '_inner_layout_small', 'inline' );

	$vertical_alignment   = get_theme_mod( $column_option_id . '_vertical_alignment_'.$device, 'flex-align-center' );
	$horizontal_alignment = get_theme_mod( $column_option_id . '_horizontal_alignment_'.$device, 'flex-start' );

	if( $inner_layout === 'stack' ){
		$vertical_alignment = str_replace( '-align', '', $horizontal_alignment );
		$horizontal_alignment = str_replace( '-', '-align-', $horizontal_alignment );
	}
	$select     = str_replace( '_', '-', $row );
	$margin   = Knote_Styles::dimensions_variables(  $column_option_id . '_margin', 'margin', $select.'-column'.( $col_id + 1 ) );
	$padding  = Knote_Styles::dimensions_variables(  $column_option_id . '_padding', 'padding', $select.'-column'.( $col_id + 1 ) );

	// Column class.
	$column_classes[] = 'grid__item';

	$column_classes[] = 'builder-column';
	$column_classes[] = $inner_layout;
	$column_classes[] = $vertical_alignment;
	$column_classes[] = $horizontal_alignment;
	$column_classes[] = 'builder-column-' . esc_attr( $col_id + 1 );

	if ( is_array( $margin ) ){
		$styles = array_merge( $styles, $margin );
	}

	if ( is_array( $padding ) ){
		$styles = array_merge( $styles, $padding );
	}

	?>

	<div class="<?php echo esc_attr( implode( ' ', $column_classes ) ); ?>"
			style="<?php echo esc_attr( implode(';', $styles ) ); ?>">
		<?php
			foreach( $elements as $component_callback ) {
				if( method_exists( $knote_builder, $component_callback  ) ) {
					call_user_func( array( $knote_builder, $component_callback ), $component_args );
				}else if( class_exists( 'KnoteToolkit' ) ) {

					$knote_premium = KnoteToolkit\Customizer::instance();
					if( method_exists( $knote_premium, $component_callback  ) ) {
						call_user_func( array( $knote_premium, $component_callback ), $component_args );
					}

				}
			}
		?>
	</div>
	<?php
endforeach;
