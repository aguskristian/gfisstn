<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--
<meta http-equiv="refresh" content="20;url=<?php echo base_url(); ?>flight_schedule/departure/" />
-->
<meta name="description" content="Real time Flight Schedule provide by PT Gapura Angkasa, the largest ground handling company in Indonesia">
<meta name="keywords" content="flight schedule, flight departure, flight arrival, flight log, flight time, airline schedule, airport schedule, schedule flight, departure flight, arrival flight, jadwal keberangkatan, jadwal kedatangan, jadwal keberangkatan pesawat, jadwal kedatangan pesawat" />
<title>General Flight Information System | PT Gapura Angkasa Denpasar</title>
<link href="<?php echo base_url(); ?>template/css/gapura_angkasa.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container"><!-- start container -->
	<div id="body"><!-- start body -->
    	<table width="1000" align="center">
            <tr>
                <td align="left"><img src="<?php echo base_url(); ?>template/images/logo/gapura.png" /></td>
                <td align="center"><h1>ARRIVAL <?php echo strtoupper($this->config->item('station_name')); ?><br /> 
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
                    <th scope="col" width="100" align="center">ORIG</th>
                    <th scope="col" width="100" align="center">STA</th>
                    <th scope="col" width="100" align="center">ETA</th>
                    <th scope="col" width="50" align="center">PARK</th>
                    <th scope="col" width="100" align="center">AC REG</th>
                    <th scope="col" width="150" align="center">AC ROT</th>
                    <th scope="col" width="50" align="center">DEL</th>
                    <th scope="col" width="174" colspan="2" align="center">REMARKS</th>
                </tr>
            </thead>
                
            <tbody>
        	<?php

				$i=0;
				 
				foreach ($query as $row){
				
				//-------------------- user ---------------------------------
					echo "<tr>";
					
					echo "<td align=\"center\">";
					echo strtoupper($row->dsa_flt_nbr); 
					echo "</td>";
					
					echo "<td align=\"center\">";
					echo strtoupper($row->dsa_stn_from);
					echo "</td>";
					
					echo "<td align=\"center\">";
					$datestring = "%H:%i";
					$time = $row->dsa_sta;
					echo mdate($datestring, strtotime($row->dsa_sta));
					echo "</td>";
					
					echo "<td align=\"center\">";
					$datestring = "%H:%i";
					if ($row->dsaeta_eta == NULL){
					echo '-';
					} else {
					$datestring = "%H:%i";
					$eta = mdate($datestring, strtotime($row->dsaeta_eta));
					echo $eta;
					} ;
					echo "</td>";
					
					echo "<td align=\"center\">";
					if ($row->dsapark_park == NULL){
					echo '-';
					} else {
					$park = strtoupper($row->dsapark_park);
					echo $park;
					} ;
					echo "</td>";
					
					echo "<td align=\"center\">";
					if ($row->dsareg_reg == NULL){
					echo '-';
					} else {
					$reg = strtoupper($row->dsareg_reg);
					echo $reg;
					} ;
					echo "</td>";
					
					echo "<td align=\"center\">";
					if ($row->dsarotasi_rotasi == NULL){
					echo '-';
					} else {
					$rot = strtoupper($row->dsarotasi_rotasi);
					echo 'to ' . $rot . '';
					} ;
					echo "</td>";
					
					echo "<td align=\"center\">";
					if ($row->dsadel_del == NULL){
					echo '-';
					} else {
					$del = strtoupper($row->dsadel_del);
					echo $del;
					} ;
					echo "</td>";
					
					echo "<td colspan=\"2\" align=\"center\">";
					if ($row->dsaremark_remark == NULL){
					echo '-';
					} else {
					echo strtoupper($row->dsaremark_remark);
					} ;
					echo "</td>";
				
					echo "</tr>";
					//--------------------- user -------------------------------------
				$i++;
				} 
				?>
        	</tbody>
		</table> 
    	<table width="1000" align="center">
            <tr>
                <td>
                <p class="footer">copyright 2011-2012 @  <a href="http://www.facebook.com/SigapGapuraAngkasa">SIGAP Team</a> - <?php echo anchor('daily/departure', 'internal'); ?></p>
                </td>
            </tr>
        </table>
    </div>
</div>