<?php
class Elementor_Flapicon_Control extends Elementor\Base_Data_Control {

	
	public function get_type() {
		return 'flaticon';
	}

	public static function get_icons() {
			return [
				'flaticon-piggy-bank' => 'piggy-bank',
				'flaticon-blood' => 'blood',
				'flaticon-food' => 'food',
				'flaticon-donation' => 'donation',
				'flaticon-dollar' => 'dollr',
				'flaticon-unity' => 'unity',
			];
		}

	
	protected function get_default_settings() {
		return [
			'options' => self::get_icons(),
			'include' => '',
			'exclude' => '',
		];
	}

	
	public function content_template() {
		?>
		<div class="elementor-control-field">
			<label for="<?php $this->print_control_uid(); ?>" class="elementor-control-title">{{{ data.label }}}</label>
			<div class="elementor-control-input-wrapper">
				<select id="<?php $this->print_control_uid(); ?>" class="elementor-control-icon" data-setting="{{ data.name }}" data-placeholder="<?php echo esc_html__( 'Select Icon', 'africa' ); ?>">
					<option value=""><?php echo esc_html__( 'Select Icon', 'africa' ); ?></option>
					<# _.each( data.options, function( option_title, option_value ) { #>
					<option value="{{ option_value }}">{{{ option_title }}}</option>
					<# } ); #>
				</select>
			</div>
		</div>
		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{ data.description }}</div>
		<# } #>
		<?php
	}
}
