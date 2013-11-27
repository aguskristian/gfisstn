<?php #$this->load->view ('template_admin/admin_logo')?>

<?php #$this->load->view ('template_admin/admin_header')?>			

	<div class="container_12">

	<?php #$this->load->view('template_admin/admin_navigation_user_level')?>

	<div class="content">

	<div class="container_12">

	<h2 class="page-title">Form Unit<span class="breadcrumbs">

	<a href="<?php echo base_url()?>index.php/unit/tabel_unit">Tabel Unit</a> &rsaquo; Form Unit</span></h2>

	</div>
	
	<div class="grid_4">			

	<br></br>
			
			<?php echo form_open_multipart('unit/submit'); ?>
			<?php echo form_hidden('vu_code',$fvu_code); ?>
    		
			<tr>
				<td> <strong><?php echo form_label('Code Unit'); ?></strong></td>
				<td> <input class="text-box" <?php echo form_input('vu_code',$fvu_code,'id="vu_code"'); ?></td>
			</tr>
			
			<tr>
				<td> <strong><?php echo form_label('Unit Name '); ?></strong></td>
				<td> <input class="text-box" <?php echo form_input('vu_name',$fvu_name,'id="vu_name"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Station Code '); ?></strong></td>
				<td> <input class="text-box" <?php echo form_input('vu_vs_code',$fvu_vs_code,'id="vu_vs_code"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Unit Level'); ?></strong></td>
				<td> <input class="text-box" <?php echo form_input('vu_level',$fvu_level,'id="vu_level" '); ?></td>
			</tr>
			<br></br>
			 
			<tr>	
			
			 <button type="submit" class="button orange" <?php echo form_submit('update','UPDATE','id="submit"'); echo form_close(); ?> Update</button>
			
			</tr>
			 


		
				
	</div>
	
	
   
			

		<?php #$this->load->view ('template_admin/admin_footer')?>
