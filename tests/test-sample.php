<?php
/**
 * Class SampleTest
 *
 * @package Lightning_Skin_Fort
 */

/**
 * Sample test case.
 */
class FortTest extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */
	// function test_sample() {
	// 	// Replace this with some actual testing code.
	// 	$this->assertTrue( true );
	// }


	/*
	そのまま出力するだけなのでテスト不要
	*/
	// function test_options_load() {
	// 	$test_array = array(
	// 		// オプション値自体が保存されていない
	// 		array(
	// 			'options'            => null,
	// 			'text_color_correct' => '#333',
	// 		),
	// 		// 像が一度も画登録されていない場合
	// 		array(
	// 			'options'            => array(
	// 				'text_color' => '#333',
	// 			),
	// 			'text_color_correct' => '#333',
	// 		),
	// 	);
	// 	print PHP_EOL;
	// 	print '------------------------------------' . PHP_EOL;
	// 	print 'options_load' . PHP_EOL;
	// 	print '------------------------------------' . PHP_EOL;
	// 	delete_option( 'vk_page_header' );
	// 	foreach ( $test_array as $key => $value ) {
	// 		delete_option( 'vk_page_header' );
	// 		$options = $value['options'];
	// 		update_option( 'vk_page_header', $options );
	// 		$vk_page_header = Vk_Page_Header::options_load();
	// 		$result         = $vk_page_header['text_color'];
	//
	// 		print 'return  :' . $result . PHP_EOL;
	// 		print 'correct :' . $value['text_color_correct'] . PHP_EOL;
	// 		$this->assertEquals( $value['text_color_correct'], $result );
	//
	// 	}
	// }

	function test_header_image_url() {
		$test_array = array(
			// オプション値自体が保存されていない
			array(
				'options' => null,
				'correct' => plugins_url( '/' ) . 'lightning-skin-fort/inc/vk-page-header/images/header-sample-biz.jpg',
			),
			// 像が一度も画登録されていない場合
			array(
				'options' => array(
					'image_basic' => null,
				),
				'correct' => plugins_url( '/' ) . 'lightning-skin-fort/inc/vk-page-header/images/header-sample-biz.jpg',
			),
			// 画像が登録されている場合
			array(
				'options' => array(
					'image_basic' => plugins_url( '/' ) . 'lightning-skin-fort/inc/vk-page-header/images/set-image.jpg',
				),
				'correct' => plugins_url( '/' ) . 'lightning-skin-fort/inc/vk-page-header/images/set-image.jpg',
			),
			// 削除された場合
			array(
				'options' => array(
					'image_basic' => '',
				),
				'correct' => '',
			),
		);

		print PHP_EOL;
		print '------------------------------------' . PHP_EOL;
		print 'test_header_image_url' . PHP_EOL;
		print '------------------------------------' . PHP_EOL;
		delete_option( 'vk_page_header' );
		foreach ( $test_array as $key => $value ) {
			$vk_page_header = $value['options'];
			update_option( 'vk_page_header', $vk_page_header );
			$vk_page_header = get_option( 'vk_page_header' );
			$result         = Vk_Page_Header::header_image_url();

			print 'return  :' . $result . PHP_EOL;
			print 'correct :' . $value['correct'] . PHP_EOL;
			$this->assertEquals( $value['correct'], $result );

		}
	}

}
