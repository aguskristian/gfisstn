<?php #$this->load->view ('template_admin/admin_logo')?>

<?php #$this->load->view ('template_admin/admin_header')?>			
				
		<div class="container_12" style="overflow-x: scroll;">
				
		<?php #$this->load->view('template_admin/admin_navigation_user_level')?>
				
		<div class="grid_12">
				
		<h2 class="page-title">Tabel Station<span class="breadcrumbs">
				
		<a href="<?php echo base_url()?>index.php/station/add_station">Form Station</a> &rsaquo; Tabel Station</span></h2></div>
				
		<table align="center"   style="font-size:12px" class="table ">
			<div>
			<strong>
			
				<?php 
				
					$search = $this->input->post( 'search' );
					
					echo $search ? "Menampilkan data pencarian '$search'" : 'Pencarian Data';
					
				?>
				
			</strong>
			</div>
     
                <form action="<?php echo site_url() ?>/station/tabel_station" method="post" class="navbar-search pull-left">
					
					<input type="search" name="search" class="input-medium search-query" placeholder="search" value="<?php echo $this->input->post( 'search' ) ?>" />
					
					
					<button class="btn" type="button">Search</button>
				
                </form>
    		
				<br></br>
                <tr align="center" bgcolor="#CCCCCC">
				
                    <td> <strong>Station Code</strong></td>
                    <td> <strong>Station Name</strong></td>
                    <td> <strong>Station Level </strong></td>
 					<td colspan="2" > Pilihan </td>
								
                </tr> 
		
<!------------------------------------------------------------------------------------------------------>

                <?php foreach ($records as $key ): ?>                    
                
				<tr>    	
                        <td> <?php echo $key->vs_code; ?> </td>
                        <td> <?php echo $key->vs_name; ?> </td>
                        <td> <?php echo $key->vs_level; ?> </td>
							
					<td>
						<!-- Icons -->
						<a title="edit" href="<?php echo base_url().'index.php/station/edit/' . $key->vs_code ?>"><img src="<?php echo base_url()?>asset/images/icons/pencil.png" alt="Edit" /></a>
						<a title="delete" href="<?php echo base_url().'index.php/station/delete/' . $key->vs_code ?>"><img src="<?php echo base_url()?>asset/images/icons/cross.png" alt="Delete" /></a> 
					</td>
                    
				</tr>
         
          
                <?php endforeach; ?>
 
            </table>
		<?php #$this->load->view ('template_admin/admin_footer')?>
		</div>
			
    
	
	
	
 