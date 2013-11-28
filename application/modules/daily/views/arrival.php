<table border='1'>

<tr>
	<th>FLIGHT</th>
    <th>DEST</th>
    <th>STA</th>
    <th>ETA</th>
    <th>ADV</th>
   
    <th>PARK</th>
    <th>REG</th>
    <th>ROT</th>
    <th>DEL</th>
    <th>REMARKS</th>
</tr>

<?php




foreach($query as $items):
	
	echo "<tr>";
	echo "<td>" . strtoupper($items->dsa_flt_nbr) . "</td>";
	echo "<td>" . strtoupper($items->dsa_stn_to) . "</td>";
	echo "<td>" . strtoupper(mdate("%H:%i", strtotime($items->dsa_sta))) . "</td>";
	echo "<td>" . strtoupper($items->dsaeta_eta) . "</td>";
	echo "<td>" . strtoupper($items->dsaadv_adv) . "</td>";
	
	echo "<td>" . strtoupper($items->dsapark_park) . "</td>";
	echo "<td>" . strtoupper($items->dsareg_reg) . "</td>";
	echo "<td>" . strtoupper($items->dsarotasi_rotasi) . "</td>";
	echo "<td>" . strtoupper($items->dsadel_del) . "</td>";
	echo "<td>" . strtoupper($items->dsadel_remarks) . "</td>";
	
	
	echo "</tr>";
	
endforeach;



?>

</table>