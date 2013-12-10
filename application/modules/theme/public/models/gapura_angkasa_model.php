<?php
class Gapura_angkasa_model extends CI_Model
{

	function __construct()
	{
        parent::__construct();
    }

// -----------------------------------------
// type : model
// function : function get_by_date
// usage : query from related table for daily
// schedule based on station and date for
// all stn except hdq
// -----------------------------------------
	function get_by_date_active($sched_stn, $sched_visible, $sched_type, $sched_date, $sched_options, $display_options)
	{
		
			if ($sched_type === "arrival") 
			{

					//arrival query
					$query=('
						
	SELECT * FROM daily_sch_arr AS sch
				
LEFT JOIN ( SELECT * FROM daily_sch_arr_eta WHERE dsaeta_visible = \'' . $sched_visible . '\' ORDER BY dsaeta_update_on DESC ) AS eta ON sch.dsa_id = eta.dsaeta_dsa_id
				
LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_reg WHERE dsareg_visible = \'' . $sched_visible . '\' ORDER BY dsareg_update_on DESC ) AS reg ON sch.dsa_id = reg.dsareg_dsa_id
				
LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_ata WHERE dsaata_visible = \'' . $sched_visible . '\' ORDER BY dsaata_update_on DESC ) AS atd ON sch.dsa_id = atd.dsaata_dsa_id
				
LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_del WHERE dsadel_visible = \'' . $sched_visible . '\' ORDER BY dsadel_update_on DESC ) AS del ON sch.dsa_id = del.dsadel_dsa_id
				
LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_park WHERE dsapark_visible = \'' . $sched_visible . '\' ORDER BY dsapark_update_on DESC ) AS park ON sch.dsa_id = park.dsapark_dsa_id
				
LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_rotasi WHERE dsarotasi_visible = \'' . $sched_visible . '\' ORDER BY dsarotasi_update_on DESC ) AS rot ON sch.dsa_id = rot.dsarotasi_dsa_id
				
LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_remark WHERE dsaremark_visible = \'' . $sched_visible . '\' ORDER BY dsaremark_update_on DESC ) AS mark ON sch.dsa_id = mark.dsaremark_dsa_id
				
	WHERE dsa_stn = \'' . $sched_stn . '\' AND dsa_visible = \'' . $sched_visible . '\' AND ( dsa_status = \'on schedule\' OR dsa_status = \'delay\' ) AND dsa_date = \'' . $sched_date . '\'  GROUP BY dsa_id DESC ORDER BY dsa_sta ASC LIMIT ' . $display_options . '  
						
					');
					//arrival query

			} 
			else
			{
			 		
					// departure query
					$query=('
				
	SELECT * FROM daily_sch_dep AS sch
		
LEFT JOIN ( SELECT * FROM daily_sch_dep_etd WHERE dsdetd_visible = \'' . $sched_visible . '\' ORDER BY dsdetd_update_on DESC ) AS etd ON sch.dsd_id = etd.dsdetd_dsd_id
		
LEFT JOIN ( SELECT * FROM daily_sch_dep_reg WHERE dsdreg_visible = \'' . $sched_visible . '\' ORDER BY dsdreg_update_on DESC ) AS reg ON sch.dsd_id = reg.dsdreg_dsd_id
		
LEFT JOIN ( SELECT * FROM daily_sch_dep_atd WHERE dsdatd_visible = \'' . $sched_visible . '\' ORDER BY dsdatd_update_on DESC ) AS atd ON sch.dsd_id = atd.dsdatd_dsd_id
		
LEFT JOIN ( SELECT * FROM daily_sch_dep_del WHERE dsddel_visible = \'' . $sched_visible . '\' ORDER BY dsddel_update_on DESC ) AS del ON sch.dsd_id = del.dsddel_dsd_id
		
LEFT JOIN ( SELECT * FROM daily_sch_dep_gate WHERE dsdgate_visible = \'' . $sched_visible . '\' ORDER BY dsdgate_update_on DESC ) AS gate ON sch.dsd_id = gate.dsdgate_dsd_id
		
LEFT JOIN ( SELECT * FROM daily_sch_dep_park WHERE dsdpark_visible = \'' . $sched_visible . '\' ORDER BY dsdpark_update_on DESC ) AS park ON sch.dsd_id = park.dsdpark_dsd_id
		
LEFT JOIN ( SELECT * FROM daily_sch_dep_rotasi WHERE dsdrotasi_visible = \'' . $sched_visible . '\' ORDER BY dsdrotasi_update_on DESC ) AS rot ON sch.dsd_id = rot.dsdrotasi_dsd_id
		
LEFT JOIN ( SELECT * FROM daily_sch_dep_remark WHERE dsdremark_visible = \'' . $sched_visible . '\' ORDER BY dsdremark_update_on DESC ) AS mark ON sch.dsd_id = mark.dsdremark_dsd_id
		
	WHERE dsd_stn = \'' . $sched_stn . '\' AND ( dsd_status = \'on schedule\' OR dsd_status = \'delay\' ) AND dsd_visible = \'' . $sched_visible . '\' AND dsd_date = \'' . $sched_date . '\' GROUP BY dsd_id DESC ORDER BY dsd_std ASC LIMIT ' . $display_options . ' 
				
					');
					// departure query
				
				}
		
		$query = $this->db->query($query);
		
		return $query->result();
		
		$query->free_result(); 
		
	}
// ----------------------------------------------------

}
/* End of file myfile.php */
/* Location: ./system/modules/mymodule/myfile.php */