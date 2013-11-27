<?php #$this->load->view ('template_admin/admin_logo')?>

<?php #$this->load->view ('template_admin/admin_header')?>			

	<div class="container_12">

	<?php #$this->load->view('template_admin/admin_navigation_user_level')?>

	<div class="content">

	<div class="container_12">

	<h2 class="page-title">Form Station<span class="breadcrumbs">

	<a href="<?php echo base_url()?>index.php/station/tabel_station">Tabel Station</a> &rsaquo; Form station</span></h2>

	</div>
	
	<div class="grid_4">			

	<br></br>

	<?php echo form_open_multipart('station/submit'); ?>

	<?php echo form_hidden('vs_code',$fvs_code); ?>

	
			<tr>
				<td> <strong><?php echo form_label('Code Station'); ?></strong></td>
				<td><input class="text-box" <?php echo form_input('vs_code',$fvs_code,'id="vs_code"'); ?></td>
			</tr>
			
			<tr>
				<td> <strong><?php echo form_label('Station Name '); ?></strong></td>
				<td><input class="text-box" <?php echo form_input('vs_name',$fvs_name,'id="vs_name"'); ?></td>
			</tr> 
			
			<tr>
				<td> <strong><?php echo form_label('Station Level'); ?></strong></td>
				<td><input class="text-box" <?php echo form_input('vs_level',$fvs_level,'id="vs_level" '); ?></td>
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