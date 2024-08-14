<div class="xgenious-product-extract-wrapper">
	<div class="xg-product-extract-header">
		<h1 class="title"><?php esc_html_e('Envato Product Extract By Product Id','xgenious');?></h1>
		<p><?php esc_html_e('import your envato product information by product id, after extract product information it will store it as a EDD download item with all the details','xgenious');?></p>
	</div>
	<?php
	$xgenious = Xgenious();
	$response_status = $xgenious->get_flash_message('purchase_status');
	if (!empty($response_status)): ?>
		<div class="xg-notice-area <?php echo $response_status == 200 ? esc_attr('success') : esc_attr('danger');?>">
			<?php
			$extract_message = $xgenious->get_flash_message('extract_message');
			printf('<p>&nbsp; %1$s</p>',$extract_message);
			?>
		</div>
	<?php endif;?>
	<form action="<?php echo admin_url('admin-post.php')?>" method="POST">
		<input type="hidden" name="action" value="extract_product_from_envato">
		<?php wp_nonce_field('extract_product_from_envato');?>
		<input type="text" name="item_id" placeholder="<?php esc_html_e('Item Id','xgenious');?>">
		<select name="item_type" id="item_type">
			<option value="wordpress-plugins"><?php esc_html_e('WordPress Plugins','xgenious');?></option>
			<option value="laravel"><?php esc_html_e('Laravel','xgenious');?></option>
			<option value="css-elements"><?php esc_html_e('CSS Elements','xgenious');?></option>
		</select>
		<button type="submit" class="button button-primary "><?php esc_html_e('Extract','xgenious');?></button>
	</form>
</div>