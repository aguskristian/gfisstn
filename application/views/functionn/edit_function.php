<?php #$this->load->view ('template_admin/admin_logo')?>

<?php #$this->load->view ('template_admin/admin_header')?>			

	<div class="container_12">

	<?php #$this->load->view('template_admin/admin_navigation_user_level')?>

	<div class="content">

	<div class="container_12">

	<h2 class="page-title">Form Function<span class="breadcrumbs">

	<a href="<?php echo base_url()?>index.php/functionn/tabel_function">Tabel Function</a> &rsaquo; Form Function</span></h2>

	</div>
	
	<div class="grid_4">			

    		<?php echo form_open_multipart('functionn/submit'); ?>
			<?php echo form_hidden('vf_code',$fvf_code); ?>
        
        
			<tr>
				<td> <strong><?php echo form_label('Function Code'); ?></strong></td>
				<td> <input class="text-box"<?php echo form_input('vf_code',$fvf_code,'id="vf_code"'); ?></td>
			</tr>
			
			<tr>
				<td> <strong><?php echo form_label('function Name '); ?></strong></td>
				<td> <input class="text-box"<?php echo form_input('vf_name',$fvf_name,'id="vf_name"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Function Level'); ?></strong></td>
				<td> <input class="text-box"<?php echo form_input('vf_level',$fvf_level,'id="vf_level" '); ?></td>
			</tr>
			<br></br>
			 <tr>	
			
			 <button type="submit" class="button orange" <?php echo form_submit('update','UPDATE','id="submit"'); echo form_close(); ?> Update</button>
			
			</tr>
		
			<div class="clear"></div>
	</div>
	</article><!-- end of stats article -->
	
    <div id="extended-form-container"></div>
			
		   
	<div class="clear"></div>
		<?php #$this->load->view ('template_admin/admin_footer')?>

 <div class="clear"></div>