<?php #$this->load->view ('template_admin/admin_logo')?>
	
<?php #$this->load->view ('template_admin/admin_header')?>			
			
		<div class="container_12" style="overflow-x: scroll;">
				
		<?php #$this->load->view('template_admin/admin_navigation_user_level')?>
			
		<div class="content">
		
		<div class="container_12">
			
		<h2 class="page-title">Form Sub Unit<span class="breadcrumbs">
			
		<a href="<?php echo base_url()?>index.php/sub_unit/tabel_sub_unit">Tabel Sub Unit</a> &rsaquo; Form Sub Unit</span></h2>
		
		</div>

		<div class="grid_4">
            <form accept-charset="UTF-8" class="new_message" id="new_message" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="4/e/8HmCN84QvWqbOVWyVzVjaeK9ql3IzLWgVc6HSSQ=" /></div>
            
				
				<div class="field">
					<label>Sub Unit Code</label>
                    <input class="text-box" name="vsu_code" size="30" type="text" />
				</div>
			
				<div>
					<label>Sub Unit Name</label>
                    <input class="text-box" name="vsu_name" size="10" type="text" />
				</div>
				
				<div class="field">
					<label>Unit Code</label>
                    <input class="text-box" name="vsu_vu_code" size="30" type="text" />
				</div>
				
				<div>
					<label>Sub Unit Level</label>
                    <input class="text-box" name="vsu_level" size="10" type="text" />
				</div>
				
				<br></br>
				<div class="field">
                    <button type="submit" class="button orange" value="Submit" name="submit" />Submit</button> 
				</div>
				
			</form>		
		</div>
</div>
	<?php #$this->load->view('template_admin/admin_footer')?>
</body>

<!-- Mirrored from www.portnine.com/contact by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 03 Jul 2013 09:27:00 GMT -->
</html>


