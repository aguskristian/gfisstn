<?php
class Arrival_model extends CI_Model
{
	
# CONSTRUCTOR ------------------------------------------------------------------------------	
	function __construct()
	{
        parent::__construct();
    }
# CONSTRUCTOR ------------------------------------------------------------------------------

# ALL SCHEDULE ------------------------------------------------------------------------------
	function get_by_date_all($stn, $date, $rows)
	{
		$query=('
		
		SELECT * FROM daily_sch_arr AS sch
		
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_eta WHERE dsaeta_visible = \'y\' ORDER BY dsaeta_update_on DESC ) AS eta ON sch.dsa_id = eta.dsaeta_dsa_id
		
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_adv WHERE dsaadv_visible = \'y\' ORDER BY dsaadv_update_on DESC ) AS adv ON sch.dsa_id = adv.dsaadv_dsa_id
		
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_reg WHERE dsareg_visible = \'y\' ORDER BY dsareg_update_on DESC ) AS reg ON sch.dsa_id = reg.dsareg_dsa_id
		
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_ata WHERE dsaata_visible = \'y\' ORDER BY dsaata_update_on DESC ) AS atd ON sch.dsa_id = atd.dsaata_dsa_id
		
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_del WHERE dsadel_visible = \'y\' ORDER BY dsadel_update_on DESC ) AS del ON sch.dsa_id = del.dsadel_dsa_id
		
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_park WHERE dsapark_visible = \'y\' ORDER BY dsapark_update_on DESC ) AS park ON sch.dsa_id = park.dsapark_dsa_id
		
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_rotasi WHERE dsarotasi_visible = \'y\' ORDER BY dsarotasi_update_on DESC ) AS rot ON sch.dsa_id = rot.dsarotasi_dsa_id
		
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_remark WHERE dsaremark_visible = \'y\' ORDER BY dsaremark_update_on DESC ) AS mark ON sch.dsa_id = mark.dsaremark_dsa_id
	
	WHERE  dsa_stn = \'' . $stn . '\' 
	
	AND  dsa_visible = \'y\' 
	
	AND dsa_date = \'' . $date . '\'  
	
	GROUP BY dsa_id DESC 
	
	ORDER BY dsa_sta ASC 
	
	LIMIT ' . $rows . '  
	');
		
		$query = $this->db->query($query);
		return $query->result();
	}
# ALL SCHEDULE ------------------------------------------------------------------------------

# ALL SCHEDULE NON GA --------------------------------------------------------------------
	function get_by_date_all_non_ga($stn, $date, $rows)
	{
			
	$query=('
	SELECT * FROM daily_sch_arr AS sch
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_eta WHERE dsaeta_visible = \'y\' ORDER BY dsaeta_update_on DESC ) AS eta ON sch.dsa_id = eta.dsaeta_dsa_id
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_adv WHERE dsaadv_visible = \'y\' ORDER BY dsaadv_update_on DESC ) AS adv ON sch.dsa_id = adv.dsaadv_dsa_id
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_reg WHERE dsareg_visible = \'y\' ORDER BY dsareg_update_on DESC ) AS reg ON sch.dsa_id = reg.dsareg_dsa_id
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_ata WHERE dsaata_visible = \'y\' ORDER BY dsaata_update_on DESC ) AS atd ON sch.dsa_id = atd.dsaata_dsa_id
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_del WHERE dsadel_visible = \'y\' ORDER BY dsadel_update_on DESC ) AS del ON sch.dsa_id = del.dsadel_dsa_id
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_park WHERE dsapark_visible = \'y\' ORDER BY dsapark_update_on DESC ) AS park ON sch.dsa_id = park.dsapark_dsa_id
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_rotasi WHERE dsarotasi_visible = \'y\' ORDER BY dsarotasi_update_on DESC ) AS rot ON sch.dsa_id = rot.dsarotasi_dsa_id
		LEFT OUTER JOIN ( SELECT * FROM daily_sch_arr_remark WHERE dsaremark_visible = \'y\' ORDER BY dsaremark_update_on DESC ) AS mark ON sch.dsa_id = mark.dsaremark_dsa_id
	WHERE  dsa_stn = \'' . $ds_stn_code_daily . '\' 
	AND dsa_airline_code <> \'ga\'
	AND  dsa_visible = \'y\' 
	AND dsa_date = \'' . $ds_date_daily . '\'  
	GROUP BY dsa_id DESC 
	ORDER BY dsa_sta ASC 
	LIMIT ' . $ds_display_options_daily . '  
	');
		
		$query = $this->db->query($query);
		return $query->result();
		$query->free_result();
	}
# ALL SCHEDULE NON GA --------------------------------------------------------------------

# ALL SCHEDULE BY AIRLINE -------------------------------------------------------------------
	function get_by_date_all_by_airline($stn, $ds_airline_daily, $date, $rows)
	{
			
	$query=('
	
	SELECT * FROM daily_sch_arr AS sch
		LEFT JOIN ( SELECT * FROM daily_sch_arr_eta WHERE dsaeta_visible = \'y\' ORDER BY dsaeta_update_on DESC ) AS eta ON sch.dsa_id = eta.dsaeta_dsa_id
		LEFT JOIN ( SELECT * FROM `daily_sch_arr_adv` WHERE dsaadv_visible = \'y\' ORDER BY dsaadv_update_on DESC ) AS adv ON sch.dsa_id = adv.dsaadv_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_reg WHERE dsareg_visible = \'y\' ORDER BY dsareg_update_on DESC ) AS reg ON sch.dsa_id = reg.dsareg_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_ata WHERE dsaata_visible = \'y\' ORDER BY dsaata_update_on DESC ) AS atd ON sch.dsa_id = atd.dsaata_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_del WHERE dsadel_visible = \'y\' ORDER BY dsadel_update_on DESC ) AS del ON sch.dsa_id = del.dsadel_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_park WHERE dsapark_visible = \'y\' ORDER BY dsapark_update_on DESC ) AS park ON sch.dsa_id = park.dsapark_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_rotasi WHERE dsarotasi_visible = \'y\' ORDER BY dsarotasi_update_on DESC ) AS rot ON sch.dsa_id = rot.dsarotasi_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_remark WHERE dsaremark_visible = \'y\' ORDER BY dsaremark_update_on DESC ) AS mark ON sch.dsa_id = mark.dsaremark_dsa_id
	WHERE  dsa_stn = \'' . $stn . '\' 
	AND dsa_airline_code = \'' . $ds_airline_daily . '\' 
	AND  dsa_visible = \'y\' 
	AND dsa_date = \'' . $date . '\'  
	GROUP BY dsa_id DESC 
	ORDER BY dsa_sta ASC 
	LIMIT ' . $rows . '  
					');					
		$query = $this->db->query($query);
		return $query->result();
		$query->free_result();
	}
# ALL SCHEDULE BY AIRLINE -------------------------------------------------------------------





# ACTIVE SCHEDULE ---------------------------------------------------------------------------
	function get_by_date_active($stn, $date, $rows)
	{
			
					$query=('
	SELECT * FROM daily_sch_arr AS sch
LEFT JOIN ( SELECT * FROM daily_sch_arr_eta WHERE dsaeta_visible = \'y\' ORDER BY dsaeta_update_on DESC ) AS eta ON sch.dsa_id = eta.dsaeta_dsa_id
LEFT JOIN ( SELECT * FROM `daily_sch_arr_adv` WHERE dsaadv_visible = \'y\' ORDER BY dsaadv_update_on DESC ) AS adv ON sch.dsa_id = adv.dsaadv_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_reg WHERE dsareg_visible = \'y\' ORDER BY dsareg_update_on DESC ) AS reg ON sch.dsa_id = reg.dsareg_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_ata WHERE dsaata_visible = \'y\' ORDER BY dsaata_update_on DESC ) AS atd ON sch.dsa_id = atd.dsaata_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_del WHERE dsadel_visible = \'y\' ORDER BY dsadel_update_on DESC ) AS del ON sch.dsa_id = del.dsadel_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_park WHERE dsapark_visible = \'y\' ORDER BY dsapark_update_on DESC ) AS park ON sch.dsa_id = park.dsapark_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_rotasi WHERE dsarotasi_visible = \'y\' ORDER BY dsarotasi_update_on DESC ) AS rot ON sch.dsa_id = rot.dsarotasi_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_remark WHERE dsaremark_visible = \'y\' ORDER BY dsaremark_update_on DESC ) AS mark ON sch.dsa_id = mark.dsaremark_dsa_id
	WHERE dsa_stn = \'' . $stn . '\' 
	AND dsa_visible = \'y\'  
	AND dsa_date = \'' . $date . '\'
	AND dsa_status = \'on schedule\'   
	GROUP BY dsa_id DESC 
	ORDER BY dsa_sta ASC 
	LIMIT ' . $rows . '  
					');
				
		$query = $this->db->query($query);
		return $query->result();
		$query->free_result(); 
	}
# ACTIVE SCHEDULE ---------------------------------------------------------------------------

# ACTIVE SCHEDULE NON GA -----------------------------------------------------------------
	function get_by_date_active_non_ga($stn, $date, $rows)
	{
			
					$query=('
	SELECT * FROM daily_sch_arr AS sch
		LEFT JOIN ( SELECT * FROM daily_sch_arr_eta WHERE dsaeta_visible = \'y\' ORDER BY dsaeta_update_on DESC ) AS eta ON sch.dsa_id = eta.dsaeta_dsa_id
		LEFT JOIN ( SELECT * FROM `daily_sch_arr_adv` WHERE dsaadv_visible = \'y\' ORDER BY dsaadv_update_on DESC ) AS adv ON sch.dsa_id = adv.dsaadv_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_reg WHERE dsareg_visible = \'y\' ORDER BY dsareg_update_on DESC ) AS reg ON sch.dsa_id = reg.dsareg_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_ata WHERE dsaata_visible = \'y\' ORDER BY dsaata_update_on DESC ) AS atd ON sch.dsa_id = atd.dsaata_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_del WHERE dsadel_visible = \'y\' ORDER BY dsadel_update_on DESC ) AS del ON sch.dsa_id = del.dsadel_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_park WHERE dsapark_visible = \'y\' ORDER BY dsapark_update_on DESC ) AS park ON sch.dsa_id = park.dsapark_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_rotasi WHERE dsarotasi_visible = \'y\' ORDER BY dsarotasi_update_on DESC ) AS rot ON sch.dsa_id = rot.dsarotasi_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_remark WHERE dsaremark_visible = \'y\' ORDER BY dsaremark_update_on DESC ) AS mark ON sch.dsa_id = mark.dsaremark_dsa_id
	WHERE dsa_stn = \'' . $stn . '\' 
	AND dsa_airline_code <> \'ga\'
	AND dsa_visible = \'y\'  
	AND dsa_date = \'' . $date . '\'
	AND dsa_status = \'on schedule\'   
	GROUP BY dsa_id DESC 
	ORDER BY dsa_sta ASC 
	LIMIT ' . $rows . '  
					');
				
		$query = $this->db->query($query);
		return $query->result();
		$query->free_result(); 
	}
# ACTIVE SCHEDULE NON GA -----------------------------------------------------------------

# ACTIVE SCHEDULE BY AIRLINE ----------------------------------------------------------------
	function get_by_date_active_by_airline($stn, $date, $ds_airline_daily, $rows)
	{
			
					$query=('
	SELECT * FROM daily_sch_arr AS sch
LEFT JOIN ( SELECT * FROM daily_sch_arr_eta WHERE dsaeta_visible = \'y\' ORDER BY dsaeta_update_on DESC ) AS eta ON sch.dsa_id = eta.dsaeta_dsa_id
LEFT JOIN ( SELECT * FROM `daily_sch_arr_adv` WHERE dsaadv_visible = \'y\' ORDER BY dsaadv_update_on DESC ) AS adv ON sch.dsa_id = adv.dsaadv_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_reg WHERE dsareg_visible = \'y\' ORDER BY dsareg_update_on DESC ) AS reg ON sch.dsa_id = reg.dsareg_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_ata WHERE dsaata_visible = \'y\' ORDER BY dsaata_update_on DESC ) AS atd ON sch.dsa_id = atd.dsaata_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_del WHERE dsadel_visible = \'y\' ORDER BY dsadel_update_on DESC ) AS del ON sch.dsa_id = del.dsadel_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_park WHERE dsapark_visible = \'y\' ORDER BY dsapark_update_on DESC ) AS park ON sch.dsa_id = park.dsapark_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_rotasi WHERE dsarotasi_visible = \'y\' ORDER BY dsarotasi_update_on DESC ) AS rot ON sch.dsa_id = rot.dsarotasi_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_remark WHERE dsaremark_visible = \'y\' ORDER BY dsaremark_update_on DESC ) AS mark ON sch.dsa_id = mark.dsaremark_dsa_id
	WHERE dsa_stn = \'' . $stn . '\'
	AND dsa_visible = \'y\'  
	AND dsa_date = \'' . $date . '\'   
	AND dsa_airline_code = \'' .$ds_airline_daily . '\'  
	AND dsa_status = \'on schedule\' 
	GROUP BY dsa_id DESC 
	ORDER BY dsa_sta ASC 
	LIMIT ' . $rows . '  
					');
				
		$query = $this->db->query($query);
		return $query->result();
		$query->free_result(); 
	}
# ACTIVE SCHEDULE BY AIRLINE ----------------------------------------------------------------




# DELAY SCHEDULE ----------------------------------------------------------------------------
	function get_by_date_delay($stn, $date, $rows)
	{
			
					$query=('
	SELECT * FROM daily_sch_arr AS sch
LEFT JOIN ( SELECT * FROM daily_sch_arr_eta WHERE dsaeta_visible = \'y\' ORDER BY dsaeta_update_on DESC ) AS eta ON sch.dsa_id = eta.dsaeta_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_adv WHERE dsaadv_visible = \'y\' ORDER BY dsaadv_update_on DESC ) AS adv ON sch.dsa_id = adv.dsaadv_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_reg WHERE dsareg_visible = \'y\' ORDER BY dsareg_update_on DESC ) AS reg ON sch.dsa_id = reg.dsareg_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_ata WHERE dsaata_visible = \'y\' ORDER BY dsaata_update_on DESC ) AS atd ON sch.dsa_id = atd.dsaata_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_del WHERE dsadel_visible = \'y\' ORDER BY dsadel_update_on DESC ) AS del ON sch.dsa_id = del.dsadel_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_park WHERE dsapark_visible = \'y\' ORDER BY dsapark_update_on DESC ) AS park ON sch.dsa_id = park.dsapark_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_rotasi WHERE dsarotasi_visible = \'y\' ORDER BY dsarotasi_update_on DESC ) AS rot ON sch.dsa_id = rot.dsarotasi_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_remark WHERE dsaremark_visible = \'y\' ORDER BY dsaremark_update_on DESC ) AS mark ON sch.dsa_id = mark.dsaremark_dsa_id
	WHERE  dsa_stn = \'' . $stn . '\' 
	AND  dsa_visible = \'y\' 
	AND dsa_date = \'' . $date . '\'
	AND dsa_otp = \'delay\' 
	AND dsa_status = \'landed\'  
	GROUP BY dsa_id DESC 
	ORDER BY dsa_sta ASC
	LIMIT ' . $rows . '  
					');
				
		$query = $this->db->query($query); 
		return $query->result();
		$query->free_result();
	}
# DELAY SCHEDULE ----------------------------------------------------------------------------

# DELAY SCHEDULE NON GA --------------------------------------------------------------------
	function get_by_date_delay_non_ga($stn, $date, $rows)
	{
		
					$query=('
	SELECT * FROM daily_sch_arr AS sch
LEFT JOIN ( SELECT * FROM daily_sch_arr_eta WHERE dsaeta_visible = \'y\' ORDER BY dsaeta_update_on DESC ) AS eta ON sch.dsa_id = eta.dsaeta_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_adv WHERE dsaadv_visible = \'y\' ORDER BY dsaadv_update_on DESC ) AS adv ON sch.dsa_id = adv.dsaadv_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_reg WHERE dsareg_visible = \'y\' ORDER BY dsareg_update_on DESC ) AS reg ON sch.dsa_id = reg.dsareg_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_ata WHERE dsaata_visible = \'y\' ORDER BY dsaata_update_on DESC ) AS atd ON sch.dsa_id = atd.dsaata_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_del WHERE dsadel_visible = \'y\' ORDER BY dsadel_update_on DESC ) AS del ON sch.dsa_id = del.dsadel_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_park WHERE dsapark_visible = \'y\' ORDER BY dsapark_update_on DESC ) AS park ON sch.dsa_id = park.dsapark_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_rotasi WHERE dsarotasi_visible = \'y\' ORDER BY dsarotasi_update_on DESC ) AS rot ON sch.dsa_id = rot.dsarotasi_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_remark WHERE dsaremark_visible = \'y\' ORDER BY dsaremark_update_on DESC ) AS mark ON sch.dsa_id = mark.dsaremark_dsa_id
	WHERE  dsa_stn = \'' . $stn . '\' 
	AND dsa_airline_code <> \'ga\'
	AND  dsa_visible = \'y\' 
	AND dsa_date = \'' . $date . '\'
	AND dsa_otp = \'delay\' 
	AND dsa_status = \'landed\'  
	GROUP BY dsa_id DESC 
	ORDER BY dsa_sta ASC
	LIMIT ' . $rows . '  
					');
			
		$query = $this->db->query($query); 
		return $query->result();
		$query->free_result();
	}
# DELAY SCHEDULE NON GA --------------------------------------------------------------------

# DELAY SCHEDULE BY AIRLINE -----------------------------------------------------------------
	function get_by_date_delay_by_airline($stn, $date, $ds_airline_daily, $rows)
	{
			
					$query=('
	SELECT * FROM daily_sch_arr AS sch
LEFT JOIN ( SELECT * FROM daily_sch_arr_eta WHERE dsaeta_visible = \'y\' ORDER BY dsaeta_update_on DESC ) AS eta ON sch.dsa_id = eta.dsaeta_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_adv WHERE dsaadv_visible = \'y\' ORDER BY dsaadv_update_on DESC ) AS adv ON sch.dsa_id = adv.dsaadv_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_reg WHERE dsareg_visible = \'y\' ORDER BY dsareg_update_on DESC ) AS reg ON sch.dsa_id = reg.dsareg_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_ata WHERE dsaata_visible = \'y\' ORDER BY dsaata_update_on DESC ) AS atd ON sch.dsa_id = atd.dsaata_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_del WHERE dsadel_visible = \'y\' ORDER BY dsadel_update_on DESC ) AS del ON sch.dsa_id = del.dsadel_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_park WHERE dsapark_visible = \'y\' ORDER BY dsapark_update_on DESC ) AS park ON sch.dsa_id = park.dsapark_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_rotasi WHERE dsarotasi_visible = \'y\' ORDER BY dsarotasi_update_on DESC ) AS rot ON sch.dsa_id = rot.dsarotasi_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_remark WHERE dsaremark_visible = \'y\' ORDER BY dsaremark_update_on DESC ) AS mark ON sch.dsa_id = mark.dsaremark_dsa_id
	WHERE  dsa_stn = \'' . $stn . '\'
	AND  dsa_visible = \'y\' 
	AND dsa_date = \'' . $date . '\'   
	AND dsa_airline_code = \'' .$ds_airline_daily . '\'   
	AND dsa_otp = \'delay\' 
	AND dsa_status = \'landed\'
	GROUP BY dsa_id DESC 
	ORDER BY dsa_sta ASC 
	LIMIT ' . $rows . '  
					');
					// arrival query
				
		$query = $this->db->query($query); 
		return $query->result();
		$query->free_result();
	}
# DELAY SCHEDULE BY AIRLINE -----------------------------------------------------------------



# DEPARTED OR ARRIVED SCHEDULE --------------------------------------------------------------
	function get_by_date_departed_arrived($stn, $date, $rows)
	{
		
					$query=('
	SELECT * FROM daily_sch_arr AS sch
LEFT JOIN ( SELECT * FROM daily_sch_arr_eta WHERE dsaeta_visible = \'y\' ORDER BY dsaeta_update_on DESC ) AS eta ON sch.dsa_id = eta.dsaeta_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_adv WHERE dsaadv_visible = \'y\' ORDER BY dsaadv_update_on DESC ) AS adv ON sch.dsa_id = adv.dsaadv_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_reg WHERE dsareg_visible = \'y\' ORDER BY dsareg_update_on DESC ) AS reg ON sch.dsa_id = reg.dsareg_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_ata WHERE dsaata_visible = \'y\' ORDER BY dsaata_update_on DESC ) AS atd ON sch.dsa_id = atd.dsaata_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_del WHERE dsadel_visible = \'y\' ORDER BY dsadel_update_on DESC ) AS del ON sch.dsa_id = del.dsadel_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_park WHERE dsapark_visible = \'y\' ORDER BY dsapark_update_on DESC ) AS park ON sch.dsa_id = park.dsapark_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_rotasi WHERE dsarotasi_visible = \'y\' ORDER BY dsarotasi_update_on DESC ) AS rot ON sch.dsa_id = rot.dsarotasi_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_remark WHERE dsaremark_visible = \'y\' ORDER BY dsaremark_update_on DESC ) AS mark ON sch.dsa_id = mark.dsaremark_dsa_id
	WHERE  dsa_stn = \'' . $stn . '\' 
	AND  dsa_visible = \'y\' 
	AND dsa_date = \'' . $date . '\'
	AND dsa_status = \'landed\'
	GROUP BY dsa_id DESC 
	ORDER BY dsa_sta ASC 
	LIMIT ' . $rows . '  
					');
				
		$query = $this->db->query($query); 
		return $query->result();
		$query->free_result();
	}
# DEPARTED OR ARRIVED SCHEDULE --------------------------------------------------------------

# DEPARTED OR ARRIVED SCHEDULE NON GA -------------------------------------------------------
	function get_by_date_departed_arrived_non_ga($stn, $date, $rows)
	{
			
					$query=('
	SELECT * FROM daily_sch_arr AS sch
		LEFT JOIN ( SELECT * FROM daily_sch_arr_eta WHERE dsaeta_visible = \'y\' ORDER BY dsaeta_update_on DESC ) AS eta ON sch.dsa_id = eta.dsaeta_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_adv WHERE dsaadv_visible = \'y\' ORDER BY dsaadv_update_on DESC ) AS adv ON sch.dsa_id = adv.dsaadv_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_reg WHERE dsareg_visible = \'y\' ORDER BY dsareg_update_on DESC ) AS reg ON sch.dsa_id = reg.dsareg_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_ata WHERE dsaata_visible = \'y\' ORDER BY dsaata_update_on DESC ) AS atd ON sch.dsa_id = atd.dsaata_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_del WHERE dsadel_visible = \'y\' ORDER BY dsadel_update_on DESC ) AS del ON sch.dsa_id = del.dsadel_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_park WHERE dsapark_visible = \'y\' ORDER BY dsapark_update_on DESC ) AS park ON sch.dsa_id = park.dsapark_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_rotasi WHERE dsarotasi_visible = \'y\' ORDER BY dsarotasi_update_on DESC ) AS rot ON sch.dsa_id = rot.dsarotasi_dsa_id
		LEFT JOIN ( SELECT * FROM daily_sch_arr_remark WHERE dsaremark_visible = \'y\' ORDER BY dsaremark_update_on DESC ) AS mark ON sch.dsa_id = mark.dsaremark_dsa_id
	WHERE  dsa_stn = \'' . $stn . '\' 
	AND dsa_airline_code <> \'ga\'
	AND  dsa_visible = \'y\' 
	AND dsa_date = \'' . $date . '\'
	AND dsa_status = \'landed\'
	GROUP BY dsa_id DESC 
	ORDER BY dsa_sta ASC 
	LIMIT ' . $rows . '  
					');
			
		$query = $this->db->query($query); 
		return $query->result();
		$query->free_result();
	}
# DEPARTED OR ARRIVED SCHEDULE NON GA -------------------------------------------------------

# DEPARTED OR ARRIVED SCHEDULE BY AIRLINE ---------------------------------------------------
	function get_by_date_departed_arrived_by_airline($stn, $date, $ds_airline_daily, $ds_status_options, $rows)
	{
			
					$query=('
	SELECT * FROM daily_sch_arr AS sch
LEFT JOIN ( SELECT * FROM daily_sch_arr_eta WHERE dsaeta_visible = \'y\' ORDER BY dsaeta_update_on DESC ) AS eta ON sch.dsa_id = eta.dsaeta_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_adv WHERE dsaadv_visible = \'y\' ORDER BY `dsaadv_update_on` DESC ) AS adv ON sch.dsa_id = adv.dsaadv_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_reg WHERE dsareg_visible = \'y\' ORDER BY dsareg_update_on DESC ) AS reg ON sch.dsa_id = reg.dsareg_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_ata WHERE dsaata_visible = \'y\' ORDER BY dsaata_update_on DESC ) AS atd ON sch.dsa_id = atd.dsaata_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_del WHERE dsadel_visible = \'y\' ORDER BY dsadel_update_on DESC ) AS del ON sch.dsa_id = del.dsadel_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_park WHERE dsapark_visible = \'y\' ORDER BY dsapark_update_on DESC ) AS park ON sch.dsa_id = park.dsapark_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_rotasi WHERE dsarotasi_visible = \'y\' ORDER BY dsarotasi_update_on DESC ) AS rot ON sch.dsa_id = rot.dsarotasi_dsa_id
LEFT JOIN ( SELECT * FROM daily_sch_arr_remark WHERE dsaremark_visible = \'y\' ORDER BY dsaremark_update_on DESC ) AS mark ON sch.dsa_id = mark.dsaremark_dsa_id
	WHERE  dsa_stn = \'' . $stn . '\'
	AND  dsa_visible = \'y\'  
	AND dsa_date = \'' . $date . '\'
	AND dsa_airline_code = \'' .$ds_airline_daily . '\'   
	AND dsa_status = \'landed\' 
	GROUP BY dsa_id DESC 
	ORDER BY dsa_sta ASC 
	LIMIT ' . $rows . '  
					');
				
		$query = $this->db->query($query); 
		return $query->result();
		$query->free_result();
	}
# DEPARTED OR ARRIVED SCHEDULE BY AIRLINE ---------------------------------------------------


# FLIGHT ------------------------------------------------------------------------------------
	function add_flt_data($ds_type, $ds_date, $ds_airline_code, $ds_flt_nbr, $ds_flt_route, $ds_acft_type, $ds_stn_from, $ds_stn_to, $ds_st, $username) 
	{
		
		$ds = 'ds' . substr($ds_type, 0, 1);
		
		$data = array(
		$ds . '_stn' => $this->config->item('station_code'), 	// dsd_stn
        $ds . '_date' => $ds_date,	// dsd_date
        $ds . '_airline_code' => $ds_airline_code,		// dsd_airline_code
		$ds . '_airline_cat' => 'unknown',  // dsd_airline_cat
		$ds . '_acft_type' => $ds_acft_type,		// dsd_acft_type
		$ds . '_flt_route' => $ds_flt_route, // dsd_flt_route
		$ds . '_flt_nbr' => $ds_flt_nbr,
		$ds . '_stn_from' => $ds_stn_from,
		$ds . '_stn_to'  => $ds_stn_to,
		$ds . '_st' . substr($ds_type, 0, 1) => $ds_st,
		$ds . '_update_by' => $username,
        );
 
        $this->db->insert('daily_sch_' . substr($ds_type, 0, 3), $data);
    }
	
	function get_flt_by_id($ds_type, $ds_id)
	{
		$ds = 'ds' . substr($ds_type, 0, 1);
		
		$this->db->where($ds . '_id', $ds_id);
		$query = $this->db->get('daily_sch_' . substr($ds_type, 0, 3));
					
		return $query->result();
	}
	
	
	function do_delete_flt_by_id($ds_type, $ds_id)
	{
		$ds = 'ds' . substr($ds_type, 0, 1);
		
		$data = array(
			$ds . '_visible' => 'n',
			$ds . '_update_by' => username(),
			);
			
		$this->db->where($ds . '_id', $ds_id);
		$this->db->update('daily_sch_' . substr($ds_type, 0, 3), $data);
	}
	
	
	function do_edit_flt_by_id($ds_type, $ds_id, $ds_airline_cat, $ds_acft_type, $ds_acft_cat, $ds_flt_route, $ds_stn_form, $ds_stn_to, $ds_st, $ds_status, $ds_otp)
	{
		
		$ds = 'ds' . substr($ds_type, 0, 1);
		
		$data = array(
			$ds . '_stn' => $this->config->item('station_code'), 	// dsd_stn
			$ds . '_airline_cat' => $ds_airline_cat, // dsd_airline_cat	
			$ds . '_acft_type' => 	$ds_acft_type,	// dsd_acft_type
			$ds . '_acft_cat' => $ds_acft_cat,	// dsd_acft_cat
			$ds . '_flt_route' => $ds_flt_route, // dsd_flt_route	
			$ds . '_stn_from' => $ds_stn_form,// dsd_stn_from	
			$ds . '_stn_to' => $ds_stn_to,// dsd_stn_to	
			$ds . '_st' . substr($ds_type, 0, 1) => $ds_st,// dsd_std	
			$ds . '_status' => $ds_status,	// dsd_status		
			$ds . '_otp' => $ds_otp,	// dsd_otp	
			$ds . '_visible' => 'y',// dsd_visible	
			$ds . '_update_by' => username(),// dsd_update_by	
			);
					
		$this->db->where($ds . '_id', $ds_id);
		$this->db->update('daily_sch_' . substr($ds_type, 0, 3), $data); 
	}
	
	
	
# FLIGHT ------------------------------------------------------------------------------------

# DAILY STATISTIC ---------------------------------------------------------------------------------
	function get_statistic_flt_by_date($ds_table_name_data, $ds_status_field, $ds_visible_field, $ds_date_field, $ds_date)
	{
		$query_statistic_flight=('SELECT ' . $ds_status_field . ', COUNT(' . $ds_status_field . ') AS total_status FROM ' . $ds_table_name_data . ' WHERE ' . $ds_date_field . ' = \'' . $ds_date . '\' AND ' . $ds_visible_field . ' = \'y\' GROUP BY ' . $ds_status_field . '');
		$query_statistic_flight = $this->db->query($query_statistic_flight); 
		
		return $query_statistic_flight->result();
	}
	
	
	
	function get_otp_flt_by_date($ds_table_name_data, $ds_otp_field, $ds_visible_field, $ds_date_field, $ds_date)
	{
		$query_otp_flight=('SELECT '. $ds_otp_field . ', COUNT(' . $ds_otp_field . ') AS total_otp FROM ' . $ds_table_name_data . ' WHERE ' . $ds_date_field . ' = \'' . $ds_date . '\' AND ' . $ds_visible_field . ' = \'y\' GROUP BY ' . $ds_otp_field . '');
		$query_otp_flight = $this->db->query($query_otp_flight); 
		
		return $query_otp_flight->result();
	}
# DAILY STATISTIC ---------------------------------------------------------------------------------

# CONTENT --------------------------------------------------------------------------------
	function add_content($ds_type, $ds_content_type, $ds_id, $ds_content) 
	{
		$ds = 'ds' . substr($ds_type, 0, 1);	// result => dsd or dsa
		
		$data = array(
		$ds . $ds_content_type . '_' . $ds . '_id' => $ds_id, // dsaata_dsa_id
		$ds . $ds_content_type . '_' . $ds_content_type => $ds_content,
		$ds . $ds_content_type . '_update_by' => username(),
		);

		$this->db->insert('daily_sch_' . substr($ds_type, 0, 3) . '_' . $ds_content_type, $data);
		
    }
# CONTENT ----------------------------------------------------------------------------------


// UPDATE ACFT TYPE AND CAT -----------------------------------------------------------------
	function update_acft_type($ds_type, $ds_reg, $ds_airline_code, $ds_id)
	{
		
		$query_update_acft_type=('
		SELECT *
		FROM aircraft_reg
		LEFT JOIN aircraft ON 
			aircraft_reg.ar_acft_type_code = aircraft.acft_type_code
			and aircraft_reg.ar_airline_code = aircraft.acft_airline_code
		WHERE aircraft_reg.ar_reg = \'' . $ds_reg . '\' AND aircraft_reg.ar_airline_code = \'' . $ds_airline_code . '\'
		');
		
		$query_update_acft_type = $this->db->query($query_update_acft_type); 
		
		//return $query_update_acft_type->result();

		if ($query_update_acft_type->num_rows() > 0)
		{
   
   			foreach ($query_update_acft_type->result() as $row)
		   {
			  $reg = $row->ar_reg;
			  $ar_acft_type_code = $row->ar_acft_type_code;
			  $acft_type_name = $row->acft_type_name;
			  $ar_airline_code = $row->ar_airline_code;
			  $acft_type_cat = $row->acft_type_cat;
				
			#update acft type
			$query_update_acft=('
			UPDATE daily_sch_' . substr($ds_type, 0, 3) . ' 
			SET ds' . substr($ds_type, 0, 1) . '_acft_type=\'' . $ar_acft_type_code . '\', ds' . substr($ds_type, 0, 1) . '_acft_type_name=\'' . $acft_type_name . '\', ds' . substr($ds_type, 0, 1) . '_acft_cat=\'' . $acft_type_cat . '\' 
			WHERE ds' . substr($ds_type, 0, 1) . '_id = \'' . $ds_id . '\'
			');
		
			$query_update_acft = $this->db->query($query_update_acft);		
				
		   }
		}
		else
		{
			$reg = 'unknown';
			$ar_acft_type_code = 'unknown';
			$ar_airline_code = 'unknown';
			$acft_type_cat = 'unknown';
			
			$query_update_acft_type=('
			UPDATE daily_sch_' . substr($ds_type, 0, 3) . ' 
			SET ds' . substr($ds_type, 0, 1) . '_acft_type=\'' . $ar_acft_type_code . '\', ds' . substr($ds_type, 0, 1) . '_acft_cat=\'' . $acft_type_cat . '\' 
			WHERE ds' . substr($ds_type, 0, 1) . '_id = \'' . $ds_id . '\'
			');
		
			$query_update_acft_type = $this->db->query($query_update_acft_type);
		}
		
		 
		
	}
// UPDATE ACFT TYPE AND CAT -----------------------------------------------------------------


// UPDATE STATUS ----------------------------------------------------------------------------------
	function set_status($ds_type, $ds_id, $ds_status)
	{
		$ds = 'ds' . substr($ds_type, 0, 1);
		
		$data = array(
               $ds . '_status' => $ds_status,
			   $ds . '_update_by' => username(),
            );
		$this->db->where($ds . '_id', $ds_id);
		$this->db->update('daily_sch_' . substr($ds_type, 0, 3), $data); 
	}
// UPDATE STATUS -------------------------------------------------------------------------------

// UPDATE OTP ----------------------------------------------------------------------------------
	function set_otp($ds_type, $ds_id, $ds_otp)
	{
		$ds = 'ds' . substr($ds_type, 0, 1);
		
		$data = array(
               $ds . '_otp' => $ds_otp,
			   $ds . '_update_by' => username(),
            );
		$this->db->where($ds . '_id', $ds_id);
		$this->db->update('daily_sch_' . substr($ds_type, 0, 3), $data); 
	}
// UPDATE OTP ----------------------------------------------------------------------------------

// UPDATE OTP NON DELAY ------------------------------------------------------------------------
	function set_otp_non_delay($ds_type, $ds_id, $ds_otp)
	{
		$ds = 'ds' . substr($ds_type, 0, 1);
		
		$data = array(
               $ds . '_otp' => $ds_otp,
			   $ds . '_update_by' => username(),
            );
		$this->db->where($ds . '_id', $ds_id);
		$this->db->update('daily_sch_' . substr($ds_type, 0, 3), $data); 
	}
// UPDATE OTP NON DELAY -----------------------------------------------------------------------

// DELAY ---------------------------------------------------------------------------------------
	function get_delay_by_id($ds_type, $ds_id)
	{
		$ds = 'ds' . substr($ds_type, 0, 1);
		
		$this->db->where($ds . 'del_' . $ds . '_id', $ds_id); // dsadel_dsa_id
		$this->db->where($ds . 'del_visible', 'y'); // dsadel_visible
		$query = $this->db->get('daily_sch_' . substr($ds_type, 0, 3) . '_del'); // daily_sch_arr_del
		
		return $query->result();
	}


	function add_delay_data($ds_type, $ds_id, $ds_del, $ds_duration, $ds_remarks, $ds_shd, $ds_gp_responsibility, $ds_update_by) 
	{
		$ds = 'ds' . substr($ds_type, 0, 1);
		
		$data = array(
			$ds . 'del_' . $ds . '_id' => $ds_id, 	// dsadel_dsa_id
			$ds . 'del_del' =>	$ds_del,
			$ds . 'del_duration' => $ds_duration,	
			$ds . 'del_remarks'	=> $ds_remarks,
			$ds . 'del_gp_responsibility' => $ds_gp_responsibility,
			$ds . 'del_shd' => $ds_shd,	
			$ds . 'del_update_by' => $ds_update_by,
        );
 
        $this->db->insert('daily_sch_' . substr($ds_type, 0, 3) . '_del', $data);
    }


	function del_delay_data($ds_type, $ds_del_id) 
	{
 		$this->db->delete('daily_sch_' . substr($ds_type, 0, 3) . '_del', array('ds' . substr($ds_type, 0, 1) . 'del_id'=> $ds_del_id));
    }

	function set_status_delay($ds_type, $ds_id_data)
	{
		$ds = 'ds' . substr($ds_type, 0, 1);
		
		$data = array(
               $ds . '_status' => 'on schedule',
			   $ds . '_update_by' => username(),
            );
		$this->db->where($ds . '_id', $ds_id_data);
		$this->db->update('daily_sch_' . substr($ds_type, 0, 3), $data); 
	}
// DELAY ---------------------------------------------------------------------------------------



}
/* End of file myfile.php */
/* Location: ./system/modules/mymodule/myfile.php */