<?php
/**
 * Plugin Name:     Lightning Skin Origin2
 * Plugin URI:      http://lightning.nagoya/ja/
 * Description:
 * Author:          Vektor,Inc.
 * Author URI:      https://vektor-inc.co.jp
 * Text Domain:     Origin2
 * Domain Path:     /languages
 * Version:         0.0.0
 * License:         GPLv2
 *
 * @package         Lightning_Skin_Origin2
 */

$data = get_file_data(
	__FILE__, array(
		'version'    => 'Version',
		'textdomain' => 'Text Domain',
	)
);

/*
 ---------------------------------------------
	updater
--------------------------------------------- */
// require 'inc/plugin-update-checker/plugin-update-checker.php';
// $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
// 'https://lightning.nagoya/wp-content/vk-data-files/lightning-fort-12523979/plugin-update-config.json',
// __FILE__,
// 'lightning-skin-fort'
// );
 define( 'LTG_II_VERSION', $data['version'] );
 define( 'LTG_II_TEXTDOMAIN', $data['textdomain'] );
 define( 'LTG_II_BASENAME', plugin_basename( __FILE__ ) );
 define( 'LTG_II_URL', plugin_dir_url( __FILE__ ) );
 define( 'LTG_II_DIR', plugin_dir_path( __FILE__ ) );



/*
-------------------------------------------
	register_skin
-------------------------------------------
*/

function ltg_origin2_register_skin( $array ) {
	 $array['origin2'] = array(
		 'label'           => 'Origin II',
		 'css_path'        => LTG_II_URL . 'css/style.css',
		 'editor_css_path' => LTG_II_URL . 'css/editor.css',
		 'php_path'        => LTG_II_DIR . 'skin-active.php',
		 // 'js_path'         => plugin_dir_url( __FILE__ ) . 'js/common.min.js',
		 // 'callback'        => 'ltg_origin2_skin_current_function',
		 'version'         => LTG_II_VERSION,
		 'bootstrap'       => 'bs4',
	 );
	return $array;
}
add_filter( 'lightning-design-skins', 'ltg_origin2_register_skin' );
/*
-------------------------------------------
	includes
-------------------------------------------
*/
// スキン選択時に class を走らせる。
// カスタマイザーのコールバック関数だと上手く動作しないので get_option して動かしている
// 以前は add_action( 'plugins_loaded', を経由して読み込んでいたが、
// そのタイミングでの読み込みでは header tel の remove action が効かないので直書きに変更
// add_action( 'plugins_loaded', 'ltg_origin2_skin_current_function_direct' );
// function ltg_origin2_skin_current_function_direct() {
// $skin = get_option( 'lightning_design_skin' );
// if ( $skin == 'origin2' ) {
	// require_once( plugin_dir_path( __FILE__ ) . 'inc/header-contact-config.php' );
	// load_plugin_textdomain( 'lightning-skin-fort', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
// }
