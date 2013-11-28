<table border='1'>

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