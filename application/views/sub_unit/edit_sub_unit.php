<?php #$this->load->view ('template_admin/admin_logo')?>

<?php #$this->load->view ('template_admin/admin_header')?>			

	<div class="container_12">

	<?php #$this->load->view('template_admin/admin_navigation_user_level')?>

	<div class="content">

	<div class="container_12">

	<h2 class="page-title">Form Sub Unit<span class="breadcrumbs">

	<a href="<?php echo base_url()?>index.php/sub_unit/tabel_sub_unit">Tabel Sub Unit</a> &rsaquo; Form Sub Unit</span></h2>

	</div>
	
	<div class="grid_4">			

	<br></br>
    	
			<?php echo form_open_multipart('sub_unit/submit'); ?>
			<?php echo form_hidden('vsu_code',$fvsu_code); ?>
        
        
			<tr>
				<td> <strong><?php echo form_label('Sub Unit Code'); ?></strong></td>
				<td> <input class="text-box" <?php echo form_input('vsu_code',$fvsu_code,'id="vsu_code"'); ?></td>
			</tr>
			
			<tr>
				<td> <strong><?php echo form_label('Sub Unit Name '); ?></strong></td>
				<td> <input class="text-box" <?php echo form_input('vsu_name',$fvsu_name,'id="vsu_name"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Unit Code '); ?></strong></td>
				<td> <input class="text-box" <?php echo form_input('vsu_vu_code',$fvsu_vu_code,'id="vsu_vu_code"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Sub Unit Level'); ?></strong></td>
				<td> <input class="text-box" <?php echo form_input('vsu_level',$fvsu_level,'id="vsu_level" '); ?></td>
			</tr>
			
			
			<br></br>
			<tr>	
			
			 <button type="submit" class="button orange" <?php echo form_submit('update','UPDATE','id="submit"'); echo form_close(); ?> Update</button>
			
			</tr>

	</div>
	
		<?php #$this->load->view ('template_admin/admin_footer')?>

 