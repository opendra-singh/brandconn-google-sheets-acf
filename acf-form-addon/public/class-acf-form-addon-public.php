<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://woodevz.com
 * @since      1.0.0
 *
 * @package    Acf_Form_Addon
 * @subpackage Acf_Form_Addon/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Acf_Form_Addon
 * @subpackage Acf_Form_Addon/public
 * @author     Ansh Agarwal <ansh.agarwal@woodevz.com>
 */
class Acf_Form_Addon_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function init_()
	{
		if (!is_admin()) {
			add_shortcode('acf-addon', [$this, 'custom_shortcode']);
		}
	}
	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Acf_Form_Addon_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Acf_Form_Addon_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Acf_Form_Addon_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Acf_Form_Addon_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js', array('jquery'), $this->version, false);
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/acf-form-addon-public.js', array('jquery'), $this->version, false);
	}


	public function custom_shortcode()
	{
		ob_start() ?>
		<style>
			.container1 {
				background-image: url("<?= plugin_dir_url(__FILE__) . '/assets/Asset 3.png' ?>"), url("<?= plugin_dir_url(__FILE__) . '/assets/Asset 4.png' ?>");
				background-position: right bottom, left bottom;
				background-repeat: no-repeat, no-repeat;
				background-color: #ffffff;
				background-size: 130px, 75px;
			}

			.form {
				background-image: url("<?= plugin_dir_url(__FILE__) . '/assets/Asset 1.png' ?>"), url("<?= plugin_dir_url(__FILE__) . '/assets/Asset 2.png' ?>");
				background-position: right bottom, left bottom;
				background-repeat: no-repeat, no-repeat;
				background-color: #ffffff;
				background-size: 130px, 75px;
			}
		</style>
		<link rel="stylesheet" href="<?= plugin_dir_url(__FILE__) . 'css/custom.css' ?>">
		<div id="primary">
			<div id="content" role="main">
				<div class="container1">
					<img class="img-two" src="<?= plugin_dir_url(__FILE__) . 'assets/RED-SHAPE.png' ?>" alt="">
					<div class="form">
						<img src="https://okmg-web-assets-rc.s3.ap-southeast-2.amazonaws.com/okmg-master.svg" alt="">
						<img class="img-right" src="<?= plugin_dir_url(__FILE__) . 'assets/Path-7892.png' ?>" alt="">
						<img class="img-one" src="<?= plugin_dir_url(__FILE__) . 'assets/GRAPHIC-DEVICE.png' ?>" alt="">
						<?php acf_form(array(
							'id' => 'acf-custom-form',
							'submit_value' => __("Submit", 'acf'),
							'updated_message' => __("Form Submitted", 'acf'),
						)); ?>
						<div class="dynamic-form">
							<div class="data">
							</div>
							<div class="temp">
							</div>
						</div>
						<div class="dropdown">
							<button class="button-17">Add Fields
								<div class="dropdown-content">
									<a class="dropdown-item insert_cat" href="#" data-toggle="modal" data-target="#exampleModal">Single Line</a>
									<a class="dropdown-item insert_cat" href="#" data-toggle="modal" data-target="#exampleModal">Multi Line</a>
									<a class="dropdown-item insert_cat" onclick="select_()" href="#">Dropdown</a>
								</div>
							</button>
						</div>
						<div class="acf-form-submit-btn text-center">
							<img src="<?= plugin_dir_url(__FILE__) . 'assets/loader.svg' ?>" class="d-none" alt="">
							<input type="button" class="" onclick="sumbit_form()" value="Submit">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Enter Label</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<label for="">Enter Label<br></label>
						<input type="text" class="form-control" id="label" autofocus placeholder="Enter Label">
						<input type="hidden" id="check_option" placeholder="Enter Label">
					</div>
					<div class="modal-footer">
						<button type="button" id="sub" class="btn btn-primary">Insert</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal" id="select_" data-backdrop="static" data-keyboard="false" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Enter Label</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<label for="">Enter Label<br></label>
						<input type="text" class="form-control" id="label_" autofocus placeholder="Enter Label">
						<input type="hidden" id="check_option_" placeholder="Enter Label">
					</div>
					<div class="modal-footer">
						<button type="button" onclick="confirm_select()" class="btn btn-primary">Insert</button>
					</div>
				</div>
			</div>
		</div>
		<script src="<?= plugin_dir_url(__FILE__) . 'js/custom.js' ?>"></script>
<?php
		$data = ob_get_contents();
		ob_get_clean();
		return $data;
	}
}
