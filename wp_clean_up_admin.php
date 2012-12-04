<?php
function wp_clean_up_admin() {
	add_options_page('WP Clean Up Page', 'WP Clean Up','manage_options', __FILE__, 'wp_clean_up_page');
}
function wp_clean_up_page(){
	if(isset($_POST['wp_slug_translate_revision'])){
		if($_POST['wp_slug_translate_revision']=='revision'){
			wp_clean_up('revision');
			echo '<div id="message" class="updated fade"><p><strong>' . __("All revisions deleted!","WP-Clean-Up") . '</strong></p></div>';
		}
	}

	if(isset($_POST['wp_slug_translate_draft'])){
		if($_POST['wp_slug_translate_draft']=='draft'){
			wp_clean_up('draft');
			echo '<div id="message" class="updated fade"><p><strong>' . __("All drafts deleted!","WP-Clean-Up") . '</strong></p></div>';
		}
	}

	if(isset($_POST['wp_slug_translate_autodraft'])){
		if($_POST['wp_slug_translate_autodraft']=='autodraft'){
			wp_clean_up('autodraft');
			echo '<div id="message" class="updated fade"><p><strong>' . __("All autodrafts deleted!","WP-Clean-Up") . '</strong></p></div>';
		}
	}
	
	if(isset($_POST['wp_slug_translate_moderated'])){
		if($_POST['wp_slug_translate_moderated']=='moderated'){
			wp_clean_up('moderated');
			echo '<div id="message" class="updated fade"><p><strong>' . __("All moderated comments deleted!","WP-Clean-Up") . '</strong></p></div>';
		}
	}

	if(isset($_POST['wp_slug_translate_spam'])){
		if($_POST['wp_slug_translate_spam']=='spam'){
			wp_clean_up('spam');
			echo '<div id="message" class="updated fade"><p><strong>' . __("All spam comments deleted!","WP-Clean-Up") . '</strong></p></div>';
		}
	}

?>
<div class="wrap">
	
<?php screen_icon(); ?>
<h2>WP Clean Up</h2>
<form action="" method="post">
<table class="form-table" style="width:400px;">
	<tr align="left" valign="top">
		<th style="width:20px;text-align:left;">
			<?php _e('Type','WP-Clean-Up'); ?>
		</th>
		<th style="width:20px;text-align:left;">
			<?php _e('Count','WP-Clean-Up'); ?>
		</th>
		<th style="width:20px;text-align:left;">
			<?php _e('Operate','WP-Clean-Up'); ?>
		</th>
	</tr>
</table>
</form>


<form action="" method="post">
<table class="form-table" style="width:400px;">
	<tr align="left" valign="top">
		<td style="width:auto;text-align:left;">
			<?php _e('Revision','WP-Clean-Up'); ?>
		</td>
		<td style="width:auto;text-align:left;">
			<?php echo wp_clean_up_count('revision'); ?>
		</td>
		<td style="width:auto;text-align:left;">
			<input type="hidden" name="wp_slug_translate_revision" value="revision" />
			<input type="submit" class="button-primary" value="<?php _e('Delete','WP-Clean-Up'); ?>" />
		</td>
	</tr>
</table>
</form>

<form action="" method="post">
<table class="form-table" style="width:400px;">
	<tr>
		<td style="width:auto;">
			<?php _e('Draft','WP-Clean-Up'); ?>
		</td>
		<td style="width:auto;">
			<?php echo wp_clean_up_count('draft'); ?>
		</td>
		<td style="width:auto;">
			<input type="hidden" name="wp_slug_translate_draft" value="draft" />
			<input type="submit" class="button-primary" value="<?php _e('Delete','WP-Clean-Up'); ?>" />
		</td>
	</tr>
</table>
</form>

<form action="" method="post">
<table class="form-table" style="width:400px;">
	<tr>
		<td>
			<?php _e('Auto Draft','WP-Clean-Up'); ?>
		</td>
		<td>
			<?php echo wp_clean_up_count('autodraft'); ?>
		</td>
		<td>
			<input type="hidden" name="wp_slug_translate_autodraft" value="autodraft" />
			<input type="submit" class="button-primary" value="<?php _e('Delete','WP-Clean-Up'); ?>" />
		</td>
	</tr>
</table>
</form>

<form action="" method="post">
<table class="form-table" style="width:400px;">
	<tr>
		<td>
			<?php _e('Moderated Comments','WP-Clean-Up'); ?>
		</td>
		<td>
			<?php echo wp_clean_up_count('moderated'); ?>
		</td>
		<td>
			<input type="hidden" name="wp_slug_translate_moderated" value="moderated" />
			<input type="submit" class="button-primary" value="<?php _e('Delete','WP-Clean-Up'); ?>" />
		</td>
	</tr>
</table>
</form>

<form action="" method="post">
<table class="form-table" style="width:400px;">
	<tr>
		<td>
			<?php _e('Spam Comments','WP-Clean-Up'); ?>
		</td>
		<td>
			<?php echo wp_clean_up_count('spam'); ?>
		</td>
		<td>
			<input type="hidden" name="wp_slug_translate_spam" value="spam" />
			<input type="submit" class="button-primary" value="<?php _e('Delete','WP-Clean-Up'); ?>" />
		</td>
	</tr>
</table>
</form>



<h3>Related Links</h3>
1. <a href="http://boliquan.com/wp-clean-up/" target="_blank">WP Clean Up (FAQ)</a> | <a href="http://wordpress.org/extend/plugins/wp-clean-up/" target="_blank">Download</a><br />
2. <a href="http://boliquan.com/wp-smtp/" target="_blank">WP SMTP</a> | <a href="http://wordpress.org/extend/plugins/wp-smtp/" target="_blank">Download</a><br />
3. <a href="http://boliquan.com/wp-code-highlight/" target="_blank">WP Code Highlight</a> | <a href="http://wordpress.org/extend/plugins/wp-code-highlight/" target="_blank">Download</a><br />
4. <a href="http://boliquan.com/wp-slug-translate/" target="_blank">WP Slug Translate</a> | <a href="http://wordpress.org/extend/plugins/wp-slug-translate/" target="_blank">Download</a><br />
5. <a href="http://boliquan.com/wp-anti-spam/" target="_blank">WP Anti Spam</a> | <a href="http://wordpress.org/extend/plugins/wp-anti-spam/" target="_blank">Download</a><br />
6. <a href="http://boliquan.com/yg-share/" target="_blank">YG Share</a> | <a href="http://wordpress.org/extend/plugins/yg-share/" target="_blank">Download</a>

<br /><br />
<?php $donate_url = plugins_url('/img/paypal_32_32.jpg', __FILE__);?>
<?php $paypal_donate_url = plugins_url('/img/btn_donateCC_LG.gif', __FILE__);?>
<?php $ali_donate_url = plugins_url('/img/alipay_donate.png', __FILE__);?>
<div class="icon32"><img src="<?php echo $donate_url; ?>" alt="Donate" /></div>
<h2>Donate</h2>
<p>
If you find my work useful and you want to encourage the development of more free resources, you can do it by donating.
</p>
<p>
<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=SKA6TPPWSATKG&item_name=BoLiQuan&no_shipping=0&no_note=1&tax=0&currency_code=USD&lc=CA&bn=PP%2dDonationsBF&charset=UTF%2d8" target="_blank"><img src="<?php echo $paypal_donate_url; ?>" alt="Paypal Donate" title="Paypal" /></a>
&nbsp;
<a href="https://me.alipay.com/boliquan" target="_blank"><img src="<?php echo $ali_donate_url; ?>" alt="Alipay Donate" title="Alipay" /></a>
</p>
<br />

<div style="text-align:center; margin:60px 0 10px 0;">&copy; <?php echo date("Y"); ?> BoLiQuan</div>

</div>
<?php 
}
add_action('admin_menu', 'wp_clean_up_admin');
?>