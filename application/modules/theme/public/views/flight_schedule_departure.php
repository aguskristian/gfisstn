<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--
<meta http-equiv="refresh" content="20;url=<?php echo base_url(); ?>flight_schedule/arrival/" />
-->
<title>General Flight Information System | PT Gapura Angkasa Denpasar</title>
<meta name="description" content="Real time Flight Schedule provide by PT Gapura Angkasa, the largest ground handling company in Indonesia">
<meta name="keywords" content="flight schedule, flight departure, flight arrival, flight log, flight time, airline schedule, airport schedule, schedule flight, departure flight, arrival flight, jadwal keberangkatan, jadwal kedatangan, jadwal keberangkatan pesawat, jadwal kedatangan pesawat" />
<link href="<?php echo base_url(); ?>template/css/gapura_angkasa.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container"><!-- start container -->
	<div id="body"><!-- start body -->
    	<table width="1000" align="center">
            <tr>
                <td align="left"><img src="<?php echo base_url(); ?>template/images/logo/gapura.png" /></td>
                <td align="center"><h1>DEPARTURE <?php echo strtoupper($this->config->item('station_name')); ?><br /> 
				<?php
                    $sched_date = now();
                    $datestring = "%d %M %Y";
                    $sched_date = strtoupper( mdate($datestring, strtotime($sched_date)));
                    echo $sched_date;
                ?> - <blink><?php
                    $sched_date = now();
                    $datestring = "%H:%i";
                    $sched_date = strtoupper( mdate($datestring, strtotime($sched_date)));
                    echo $sched_date;
                ?></blink> LT
                </h1>
                </td>
                <td align="right"><img src="<?php echo base_url(); ?>template/images/logo/gapura-right.png" />
                </td>
            </tr>
        </table>
        
        <table id="wide-style" align="center" width="1000">

            <thead>
                
            
                <tr>
                    <th scope="col" width="100" align="center">FLIGHT</th>
                    <th scope="col" width="100" align="center">DEST</th>
                    <th scope="col" width="100" align="center">STD</th>
                    <th scope="col" width="100" align="center">ETD</th>
                    <th scope="col" width="75" align="center">GATE</th>
                    <th scope="col" width="75" align="center">PARK</th>
                    <th scope="col" width="125" align="center">AC REG</th>
                    <th scope="col" width="125" align="center">AC ROT</th>
                    <th scope="col" width="100" align="center">DEL</th>
                    <th scope="col" width="100" align="center">REMARK</th>
                </tr>
            </thead>
                
            <tbody>
        	<?php

				$i=0;
				 
				foreach ($query as $row){
				
				//------------ user level ---------------------
					echo "<tr>";
					
					
					echo "<td align=\"center\">";
					$flt_nbr = strtoupper($row->dsd_flt_nbr);
					echo $flt_nbr;
					echo "</td>";
					
					
					echo "<td align=\"center\">";
					echo strtoupper($row->dsd_stn_to);
					echo "</td>";
					
					
					echo "<td align=\"center\">";
					$datestring = "%H:%i";
					$time = $row->dsd_std;
					echo mdate($datestring, strtotime($row->dsd_std));
					echo "</td>";
					
					echo "<td align=\"center\">";
					$datestring = "%H:%i";
					if ($row->dsdetd_etd == NULL){
					echo '-';
					} else {
					$datestring = "%H:%i";
					$etd = mdate($datestring, strtotime($row->dsdetd_etd));
					echo $etd;
					} ;
					echo "</td>";
					
					
					echo "<td align=\"center\">";
					if ($row->dsdgate_gate == NULL){
					echo '-';
					
					} else {
					$gate = strtoupper($row->dsdgate_gate);
					echo $gate;
					} ;
					echo "</td>";
					
					
					echo "<td align=\"center\">";
					if ($row->dsdpark_park == NULL){
					echo '-';
					} else {
					$park = strtoupper($row->dsdpark_park);
					echo $park;
					} ;
					echo "</td>";
					
					
					echo "<td align=\"center\">";
					if ($row->dsdreg_reg == NULL){
					echo '-';
					
					} else {
					$reg = strtoupper($row->dsdreg_reg);
					echo $reg;
					} ;
					echo "</td>";
					
					echo "<td align=\"center\">";
					if ($row->dsdrotasi_rotasi == NULL){
					echo '-';
					
					} else {
					$rot = strtoupper($row->dsdrotasi_rotasi);
					echo 'ex ' . $rot . '';
					} ;
					echo "</td>";
					
					
					echo "<td align=\"center\">";
					if ($row->dsddel_del == NULL){
					echo '-';
					
					} else {
					$del = strtoupper($row->dsddel_del);
					echo $del;
					} ;
					echo "</td>";
					
					
					
					echo "<td align=\"center\">";
					if ($row->dsdremark_remark == NULL){
					echo '-';
					} else {
					echo strtoupper($row->dsdremark_remark);
					} ;
					echo "</td>";
				
					
					echo "</tr>";
					//---------------- user level ------------------------------
				
				
				$i++;
				  
				} 
				
			?>
        	</tbody>
		</table> 
    	<table width="1000" align="center">
            <tr>
                <td>
          <p class="footer">copyright 2011-2012 @  <a href="http://www.facebook.com/SigapGapuraAngkasa">SIGAP Team</a> - <?php echo anchor('daily/', 'internal'); ?></p>
                </td>
            </tr>
        </table>
    </div>
</div>