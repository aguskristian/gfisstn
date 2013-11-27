<?php #$this->load->view ('template_admin/admin_logo')?>

<?php #$this->load->view ('template_admin/admin_header')?>			

	<div class="container_12">

	<?php #$this->load->view('template_admin/admin_navigation_user_level')?>

	<div class="content">

	<div class="container_12">

	<h2 class="page-title">Form Team<span class="breadcrumbs">

	<a href="<?php echo base_url()?>index.php/team/tabel_team">Tabel Team</a> &rsaquo; Form Team</span></h2>

	</div>
	
	<div class="grid_4">			

	<br></br>
			
			<?php echo form_open_multipart('team/submit'); ?>
			<?php echo form_hidden('vt_code',$fvt_code); ?>
        
			<tr>
				<td> <strong><?php echo form_label('Team Code'); ?></strong></td>
				<td> <input class="text-box" <?php echo form_input('vt_code',$fvt_code,'id="vt_code"'); ?></td>
			</tr>
			
			<tr>
				<td> <strong><?php echo form_label('Team Name '); ?></strong></td>
				<td> <input class="text-box" <?php echo form_input('vt_name',$fvt_name,'id="vt_name"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Sub Unit Code '); ?></strong></td>
				<td> <input class="text-box" <?php echo form_input('vt_vsu_code',$fvt_vsu_code,'id="vt_vsu_code"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Team Level'); ?></strong></td>
				<td> <input class="text-box"<?php echo form_input('vt_level',$fvt_level,'id="vt_level" '); ?></td>
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