<?php
/**
 * Tile modules template.
 * Imported via the Orbit_Fox_Render_Helper.
 *
 * @link       https://themeisle.com
 * @since      1.0.0
 *
 * @package    Orbit_Fox
 * @subpackage Orbit_Fox/app/views/partials
 */

if ( ! isset( $name ) ) {
	$name = __( 'Module Name', 'themeisle-companion' );
}

if ( ! isset( $description ) ) {
	$description = __( 'Module Description ...', 'themeisle-companion' );
}

if ( ! isset( $checked ) ) {
	$checked = '';
}

$toggle_class = 'obfx-mod-switch';

if ( ! empty( $confirm_intent ) ) {

	$toggle_class .= ' obfx-mod-confirm-intent';
	$modal = '
        <div id="' . esc_attr( $slug ) . '" class="modal">
            <a href="#close" class="close-confirm-intent modal-overlay" aria-label="Close"></a>
            <div class="modal-container"> 
                <div class="modal-header">
                    <a href="#" class="btn btn-clear float-right close-confirm-intent" aria-label="Close"></a>
                </div>
                <div class="modal-body">' . wp_kses_post( $confirm_intent ) . '</div>
                <div class="modal-footer">
                        <button class="btn btn-primary accept-confirm-intent">' . __( 'Got it!', 'themeisle-companion' ) . '</button>
                </div>
            </div>
        </div>';
}

$noance = wp_create_nonce( 'obfx_activate_mod_' . $slug );

?>
<div class="tile">
	<div class="tile-icon">
		<div class="example-tile-icon">
			<i class="dashicons dashicons-admin-plugins centered"></i>
		</div>
	</div>
	<div class="tile-content">
		<p class="tile-title"><?php echo $name; ?></p>
		<p class="tile-subtitle"><?php echo $description; ?></p>
	</div>
	<div class="tile-action">
		<div class="form-group">
			<label class="form-switch">
				<input class="<?php echo esc_attr( $toggle_class ); ?>" type="checkbox" name="<?php echo $slug; ?>" value="<?php echo $noance; ?>" <?php echo $checked; ?> >
				<i class="form-icon"></i><?php echo  __( 'Activate', 'themeisle-companion' ); ?>
			</label>
			<?php
			if ( ! empty( $modal ) ) {
				echo wp_kses_post( $modal );
			}
			?>
		</div>
	</div>

</div>

