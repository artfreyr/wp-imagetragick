<div>
    <h3 style="text-align: center;">We created this page specially for our customers to share the great experiences they have had while dining at our place. Feel free to upload your photos here!</h3>
</div>	
<div>
<form id="file-form" enctype="multipart/form-data" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
    <p id="async-upload-wrap" style="padding-top: 60px;">
    <label for="async-upload">browse for image</label>
    <p ><input type="file" id="async-upload" name="async-upload"> <input type="submit" value="Upload" name="html-upload">
    

    <p>
    <input type="hidden" name="post_id" id="post_id" value="<?php echo '212';?>" />
    <?php wp_nonce_field('client-file-upload'); ?>
    <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
    </p>

    <!--<p>
    <input type="submit" value="Save all changes" name="save" style="display: none;">
    </p>-->
    </form>
</div>

<?php
if ( isset( $_POST['html-upload'] ) && !empty( $_FILES ) ) {
    require_once(ABSPATH . 'wp-admin/includes/admin.php');
    $id = media_handle_upload('async-upload', 1199); //post id of Client Files page
    unset($_FILES);
    if ( is_wp_error($id) ) {
        $errors['upload_error'] = $id;
        $id = false;
    }

    if ($errors) {
        echo "<p>There was an error uploading your file.</p>";
    } else {
        echo "<p>Your file has been uploaded.</p>";
	image_magick_exec($id);
    }
}
?>
