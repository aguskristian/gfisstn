<?php
	class User_level extends CI_Model
	{
	function __construct(){
	
		parent::__construct();
		
			$this->load->database();
	}
	#---------------------------------------------------------
	#							STATION					     -
	#---------------------------------------------------------
	#input data dari form station
	function input_station($data)
		{
			$query =$this->db->insert('var_station',$data);
		}
	
	function station_tabel()
    		{
				#memanggil nilai dari tabel 'var_station'
       			$query = $this->db->get('var_station');
				if ( $this->input->post( 'search' ) ) $data['records'] = $this->user_level->search_station( $this->input->post( 'search' ));
				
return $query->result();
			}
			
	function delete_station($id)
			{
        		#menghapus nilai berdasarkan id
				$this->db->delete('var_station', array('vs_code'=>$id));
    		}
		
	function edit_station($id)
			{
				$query = $this->db->get_where('var_station',array('vs_code'=>$id));
				return $query->row_array();
			}
	 function search_station($qword)
        {
            #melakukan proses searching berdasarkan field database 
            //$query = $this->input->POST ('search');
			$this->db->select('*');
			$this->db->from('var_station');
            $this->db->like ('vs_code', $qword);
            $this->db->or_like('vs_name', $qword);
			$this->db->or_like('vs_level', $qword);
         
            return $this->db->get()->result(); 
        }
		
	#---------------------------------------------------------
	#						 UNIT						     -
	#---------------------------------------------------------
	#input data dari form unit	
	function add_unit($data)
		{
			$query =$this->db->insert('var_unit',$data);
		}
		
	function unit_tabel()
    		{
				#memanggil nilai dari tabel 'var_unit'
       			$query = $this->db->get('var_unit');
				return $query->result();
			}	
	
	function delete_unit($id)
			{
        		#menghapus nilai berdasarkan id
				$this->db->delete('var_unit', array('vu_code'=>$id));
    		}
		
	function edit_unit($id)
			{
				$query = $this->db->get_where('var_unit',array('vu_code'=>$id));
				return $query->row_array();
			}
			
	 function search_unit($qword)
        {
            #melakukan proses searching berdasarkan field database 
            //$query = $this->input->POST ('search');
			$this->db->select('*');
			$this->db->from('var_unit');
            $this->db->like ('vu_code', $qword);
            $this->db->or_like('vu_name', $qword);
			$this->db->or_like('vu_vs_code', $qword);
			$this->db->or_like('vu_level', $qword);
         
            return $this->db->get()->result(); 
        }
			
	#---------------------------------------------------------
	#							SUB UNIT				     -
	#---------------------------------------------------------
	#input data dari form sub unit	
	function add_sub_unit($data)
		{
			$query =$this->db->insert('var_sub_unit',$data);
		}
		
	function sub_unit_tabel()
    		{
				#memanggil nilai dari tabel 'var_unit'
       			$query = $this->db->get('var_sub_unit');
				return $query->result();
			}
				
	function delete_sub_unit($id)
			{
        		#menghapus nilai berdasarkan id
				$this->db->delete('var_sub_unit', array('vsu_code'=>$id));
    		}
		
	function edit_sub_unit($id)
			{
				$query = $this->db->get_where('var_sub_unit',array('vsu_code'=>$id));
				return $query->row_array();
			}
			
	function search_sub_unit($qword)
        {
            #melakukan proses searching berdasarkan field database 
            //$query = $this->input->POST ('search');
			$this->db->select('*');
			$this->db->from('var_sub_unit');
            $this->db->like ('vsu_code', $qword);
            $this->db->or_like('vsu_name', $qword);
			$this->db->or_like('vsu_vu_code', $qword);
			$this->db->or_like('vsu_level', $qword);
         
            return $this->db->get()->result(); 
        }
			
	#---------------------------------------------------------
	#							TEAM					     -
	#---------------------------------------------------------	
	#input data dari form team	
	function add_team($data)
		{
			$query =$this->db->insert('var_team',$data);
		}
		
	function team_tabel()
    		{
				#memanggil nilai dari tabel 'var_team'
       			$query = $this->db->get('var_team');
				return $query->result();
			}	
			
	function delete_team($id)
			{
        		#menghapus nilai berdasarkan id
				$this->db->delete('var_team', array('vt_code'=>$id));
    		}
		
	function edit_team($id)
			{
				$query = $this->db->get_where('var_team',array('vt_code'=>$id));
				return $query->row_array();
			}
			
	function search_team($qword)
        {
            #melakukan proses searching berdasarkan field database 
            //$query = $this->input->POST ('search');
			$this->db->select('*');
			$this->db->from('var_team');
            $this->db->like ('vt_code', $qword);
            $this->db->or_like('vt_name', $qword);
			$this->db->or_like('vt_vsu_code', $qword);
			$this->db->or_like('vt_level', $qword);
         
            return $this->db->get()->result(); 
        }
			
	#---------------------------------------------------------
	#							FUNCTION				     -
	#---------------------------------------------------------
	#input data dari form function	
	function add_function($data)
		{
			$query =$this->db->insert('var_function',$data);
		}
		
	function function_tabel()
    		{
				#memanggil nilai dari tabel 'var_function'
       			$query = $this->db->get('var_function');
				return $query->result();
			}	
			
	function delete_function($id)
			{
        		#menghapus nilai berdasarkan id
				$this->db->delete('var_function', array('vf_code'=>$id));
    		}
		
	function edit_function($id)
			{
				$query = $this->db->get_where('var_function',array('vf_code'=>$id));
				return $query->row_array();
			}
			
	function search_function($qword)
        {
            #melakukan proses searching berdasarkan field database 
            //$query = $this->input->POST ('search');
			$this->db->select('*');
			$this->db->from('var_function');
            $this->db->like ('vf_code', $qword);
            $this->db->or_like('vf_name', $qword);
			$this->db->or_like('vf_level', $qword);
			
         
            return $this->db->get()->result(); 
        }
			
			
	#---------------------------------------------------------
	#							POSITION				     -
	#---------------------------------------------------------		
	#input data dari form function	
	function add_position($data)
		{
			$query =$this->db->insert('var_position',$data);
		}
	function position_tabel()
    		{
				#memanggil nilai dari tabel 'var_position'
       			$query = $this->db->get('var_position');
				return $query->result();
			}

	function delete_position($id)
			{
        		#menghapus nilai berdasarkan id
				$this->db->delete('var_position', array('vp_code'=>$id));
    		}
		
	function edit_position($id)
			{
				$query = $this->db->get_where('var_position',array('vp_code'=>$id));
				return $query->row_array();
			}
	function search_position($qword)
        {
            #melakukan proses searching berdasarkan field database 
            //$query = $this->input->POST ('search');
			$this->db->select('*');
			$this->db->from('var_position');
            $this->db->like ('vp_code', $qword);
            $this->db->or_like('vp_name', $qword);
			$this->db->or_like('vp_vt_code', $qword);
			$this->db->or_like('vp_vf_code', $qword);
			$this->db->or_like('vp_level', $qword);
			
         
            return $this->db->get()->result(); 
        }
		
	#---------------------------------------------------------
	#							GUDANG				     -
	#---------------------------------------------------------
		
	function input_gudang($data)
		{
			$query =$this->db->insert('gudang_atk',$data);
		}
	
	function gudang_tabel()
    		{
				#memanggil nilai dari tabel 'var_station'
       			$query = $this->db->get('gudang_atk');
				return $query->result();
			}
			
	function delete_gudang($id)
			{
        		#menghapus nilai berdasarkan id
				$this->db->delete('gudang_atk', array('id_gudang'=>$id));
    		}
		
	function edit_gudang($id)
			{
				$query = $this->db->get_where('gudang_atk',array('id_gudang'=>$id));
				return $query->row_array();
			}
	function search_gudang($qword)
        {
            #melakukan proses searching berdasarkan field database 
            //$query = $this->input->POST ('search');
			$this->db->select('*');
			$this->db->from('gudang_atk');
            $this->db->like ('id_gudang', $qword);
            $this->db->or_like('no_inventory', $qword);
			$this->db->or_like('kode_akun', $qword);
			$this->db->or_like('serial_number', $qword);
			$this->db->or_like('jenis_barang', $qword);
			$this->db->or_like('spesifikasi', $qword);
			$this->db->or_like('penempatan_awal', $qword);
			$this->db->or_like('berita_acara', $qword);
			$this->db->or_like('remaks', $qword);
			$this->db->or_like('update_on', $qword);
			$this->db->or_like('update_by', $qword);
			$this->db->or_like('file_pdf', $qword);
			$this->db->or_like('gambar', $qword);
			
			
         
            return $this->db->get()->result(); 
        }
			
	
	}