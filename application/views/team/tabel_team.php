<?php #$this->load->view ('template_admin/admin_logo')?>

<?php #$this->load->view ('template_admin/admin_header')?>			
				
		<div class="container_12" style="overflow-x: scroll;">
				
		<?php #$this->load->view('template_admin/admin_navigation_user_level')?>
				
		<div class="grid_12">
				
		<h2 class="page-title">Tabel Team<span class="breadcrumbs">
				
		<a href="<?php echo base_url()?>index.php/team/add_team">Form Team</a> &rsaquo; Tabel Team</span></h2></div>
				
		<table align="center"   style="font-size:12px" class="table ">
		
			<div>
			<strong>
			
				<?php 
				
					$search = $this->input->post( 'search' );
					
					echo $search ? "Menampilkan data pencarian '$search'" : 'Pencarian Data';
					
				?>
				
			</strong>
			</div>
     
                <form action="<?php echo site_url() ?>/team/tabel_team" method="post" class="navbar-search pull-left">
					
					<input type="search" name="search" class="input-medium search-query" placeholder="search" value="<?php echo $this->input->post( 'search' ) ?>" />
					
					
					<button class="btn" type="button">Search</button>
				
                </form>
				
			<br></br>
    		<table align="center" border="1" cellpadding="0" cellspacing="0" style="font-size:12px" class="table table-bordered">

                <tr align="center" bgcolor="#CCCCCC">
				
                    <td> <strong>Team Code</strong></td>
                    <td> <strong>Team Name </strong></td>
                    <td> <strong>Sub Unit Code </strong></td>
					<td> <strong>Team Level </strong></td>
 					<td colspan="2" > Pilihan </td>
								
                </tr> 
		
<!------------------------------------------------------------------------------------------------------>

                <?php foreach ($records as $key ): ?>                    
                
				<tr>    	
                        <td> <?php echo $key->vt_code; ?> </td>
                        <td> <?php echo $key->vt_name; ?> </td>
                        <td> <?php echo $key->vt_vsu_code; ?> </td>
						<td> <?php echo $key->vt_level; ?> </td>
							
						<td>
						<!-- Icons -->
						<a title="edit" href="<?php echo base_url().'index.php/team/edit/' . $key->vt_code ?>"><img src="<?php echo base_url()?>asset/images/icons/pencil.png" alt="Edit" /></a>
						<a title="delete" href="<?php echo base_url().'index.php/team/delete/' . $key->vt_code ?>"><img src="<?php echo base_url()?>asset/images/icons/cross.png" alt="Delete" /></a> 
						</td>
                    
				</tr>
         
          
                <?php endforeach; ?>
 
            </table>
		<?php #$this->load->view ('template_admin/admin_footer')?>
		</div>