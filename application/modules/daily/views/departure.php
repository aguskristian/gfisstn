<div class="wrapper">
  
  <!-- left nav -->
  <div class="left-nav">
   
    <!-- side nav -->
    <div id="side-nav">
      
      <!-- nav --->
      <ul id="nav">
        
        <li class="current"> <a href="index.html"> <i class="icon-dashboard"></i> GFIS </a> </li>
        
        <li> <a href="#"> <i class="icon-desktop"></i> UI Features <span class="label label-info pull-right">7</span> <i class="arrow icon-angle-left"></i></a>
          <ul class="sub-menu">
            <li> <a href="general.html"> <i class="icon-angle-right"></i> General </a> </li>
            <li> <a href="buttons.html"> <i class="icon-angle-right"></i> Buttons </a> </li>
            <li> <a href="tabs.html"> <i class="icon-angle-right"></i> Tabs</a> </li>
            <li> <a href="accordions.html"> <i class="icon-angle-right"></i> Accordions </a> </li>
            <li> <a href="nestable.html"> <i class="icon-angle-right"></i> Nestable List </a> </li>
            <li> <a href="icons.html"> <i class="icon-angle-right"></i> Icons </a> </li>
            <li> <a href="grid.html"> <i class="icon-angle-right"></i> Grid </a> </li>
            <li> <a href="dialogs.html"> <i class="icon-angle-right"></i> Dialogs </a> </li>
          </ul>
        </li>
		
		<li><a href="#"> <i class="icon-desktop"></i> ARRIVAL </a> </li>
		<table align="center">
		<tr>
		<td> DATE </td><td>:</td><td><input type="date"></td>
		</tr>
		
		<tr>
		<td> AIRLINE </td><td>:</td>
		<td> 
		<select class="form-control" name="airline">
			  <option>1</option>
			  <option>2</option>
		</select>
		</td>
		</tr>
		
		<tr>
		<td> STATUS </td><td>:</td>
		<td>
		<select class="form-control" name="airline">
			  <option>1</option>
			  <option>2</option>
		</select>
		</td>
		</tr>
		
		<tr>
		<td> DISPLAYED </td><td>:</td>
		<td>
		<select class="form-control" name="airline">
			  <option>GA</option>
			  <option>NON GA</option>
		</select>
		</td>
		</tr>
		</table>
		<li><a href="#"> <i class="icon-desktop"></i> DEPARTURE </a> </li>
		<table align="center">
		<tr>
		<td> DATE </td><td>:</td><td><input type="date"></td>
		</tr>
		
		<tr>
		<td> AIRLINE </td><td>:</td>
		<td> 
		<select class="form-control" name="airline">
			  <option>1</option>
			  <option>2</option>
		</select>
		</td>
		</tr>
		
		<tr>
		<td> STATUS </td><td>:</td>
		<td>
		<select class="form-control" name="airline">
			  <option>1</option>
			  <option>2</option>
		</select>
		</td>
		</tr>
		
		<tr>
		<td> DISPLAYED </td><td>:</td>
		<td>
		<select class="form-control" name="airline">
			  <option>1</option>
			  <option>2</option>
		</select>
		</td>
		</tr>
		</table>
      
      </ul>
      <!-- nav --->
      
    </div>
  	<!-- side nav -->
    
  </div>
  <!-- left nav -->
  
  <div class="page-content">
   
    <div class="content container">
    
    
      
      
      
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">Dashboard</h2>
        </div>
      </div>
      
      
      <div class="row">
        
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Daily Flight Schedule</h3>
            </div>
            <div class="widget-content">
            
            <table class="table table-bordered">

                <tr>
                    <th>FLIGHT</th>
                    <th>DEST</th>
                    <th>STD</th>
                    <th>ETD</th>
                    <th>ADV</th>
                    <th>GATE</th>
                    <th>PARK</th>
                    <th>REG</th>
                    <th>ROT</th>
                    <th>DEL</th>
                    <th>REMARKS</th>
                </tr>
                
                <?php
                foreach($query as $items):
                    
                    echo "<tr>";
                    echo "<td>" . strtoupper($items->dsd_flt_nbr) . "</td>";
                    echo "<td>" . strtoupper($items->dsd_stn_to) . "</td>";
                    echo "<td>" . strtoupper(mdate("%H:%i", strtotime($items->dsd_std))) . "</td>";
                    echo "<td>" . strtoupper($items->dsdetd_etd) . "</td>";
                    echo "<td>" . strtoupper($items->dsdadv_adv) . "</td>";
                    echo "<td>" . strtoupper($items->dsdgate_gate) . "</td>";
                    echo "<td>" . strtoupper($items->dsdpark_park) . "</td>";
                    echo "<td>" . strtoupper($items->dsdreg_reg) . "</td>";
                    echo "<td>" . strtoupper($items->dsdrotasi_rotasi) . "</td>";
                    echo "<td>" . strtoupper($items->dsddel_del) . "</td>";
                    echo "<td>" . strtoupper($items->dsddel_remarks) . "</td>";
                    echo "</tr>";
                    
                endforeach;
                ?>
                
               </table>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>




