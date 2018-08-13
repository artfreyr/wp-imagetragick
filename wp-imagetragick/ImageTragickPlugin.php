<?php
   /*
   Plugin Name: WP ImageMagick Exploit Demo
   description: This plugin intends to demonstrate the effects of CVE-2016-3714 within the context of Wordpress. For usage instructions, refer to https://github.com/beaugold/wp-imagetragick/README.md
   Version: 0.2
   Author: Daniel Lim, Nurul Asfilzah, Frances Alexandra Renton
   Author URI: https://github.com/beaugold
   License: GPL2
   */

   add_action('admin_menu', 'test_plugin_setup_menu');

   function test_plugin_setup_menu(){
	add_menu_page('WPImageTragick', 'WPImageTragick', 'manage_options', 'WPImageTragick', 'menu_init');
   }

   function menu_init() {
	test_handle_post();
   ?>
	<h1>CVE-2016-3714 Demo</h1>
	<h2>Test exploit by uploading crafted image file</h2>
	<!-- Form to handle the upload -->
	<form method="post" enctype="multipart/form-data">
		<input type='file' id='upload_files' name='upload_files'></input>
		<?php submit_button('Upload') ?>
	</form>
   <?php

   }

   function test_handle_post(){
	// First check if the file appears on the _FILES array
	if(isset($_FILES['upload_files'])){
		$imagefile = $_FILES['upload_files'];

		// Use the wordpress function to upload
		// upload_files corresponds to the position in the $_FILES array
		// 0 means the content is not associated with any other posts
		$uploaded = media_handle_upload('upload_files', 0);
		// Error checking using WP functions
		if(is_wp_error($uploaded)){
			echo "Error uploading file: " . $uploaded->get_error_message();
		} else {
			echo "File upload successful!";
			image_magick_exec($uploaded);
		}
	}

   }

   function image_magick_exec($id){
	$inputfile = get_attached_file($id);
	$outputfile = "/var/www/html/wp-content/uploads/useruploads/" . $id . ".jpg" ;
	echo shell_exec("convert $inputfile $outputfile"); 
   }

   add_shortcode("tragick_uploader", "tragick_shortcode");

   function tragick_shortcode(){
	require("shortcodeform.php");
   }

?>
