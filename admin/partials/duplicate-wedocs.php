<div class="xgenious-product-extract-wrapper">
	<div class="xg-product-extract-header">
		<h1 class="title"><?php esc_html_e('Duplocate WeDocs Doc','xgenious');?></h1>
		<p><?php esc_html_e('help to duplicate wedocs doc','xgenious');?></p>
	</div>

<div class="xg-notice-area" id="wedoc_duplicate_msg_wrap" style="display: none"></div>
<form action="<?php echo admin_url('admin-post.php')?>" method="POST">
	<input type="hidden" name="action" value="duplicate_wedocs">
	<?php wp_nonce_field('duplicate_wedocs_nonce');?>
	<select name="wedoc_id" id="wedocs_id">
		<option value=""><?php esc_html_e('Select Doc');?></option>
		<?php
			foreach(Xgenious()->get_wedocs_items() as $id=> $title){
				printf('<option value="%1$s">%2$s</option>',$id,$title);
			}
		?>
	</select>
	<input type="text" name="new_doc_name" id="new_doc_name">
	<button type="submit" class="button button-success" id="duplicate_wedocs_submit_btn"><?php esc_html_e('Duplicate','xgenious');?></button>
</form>
</div>