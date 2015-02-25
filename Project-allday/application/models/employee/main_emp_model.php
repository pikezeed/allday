<?php 

//get_instance()->load->iface_model('blueprint_model'); 

class Main_emp_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}


	public function getAllEmpData(){
		try{
			
			$this->load->database(); // open database
			$this->db->select('emp.id_emp, emp.emp_number, emp.name as empName, emp.surname, emp.address, emp.email, emp.tel, emp.sex, emp.date_start, emp.img_path,
							   per.id_permission, per.name as perName
							 ');
			$this->db->from('tbl_employee as emp');
			$this->db->join('tbl_permission as per', 'emp.id_permission = per.id_permission', 'left');
			$this->db->order_by("emp.id_emp","desc");
			$query = $this->db->get(); // get data
			if($query->num_rows() == 0){
				throw new Exception();
			}
                        $this->db->close(); // close
			return $query->result(); //return data employee

		}catch(Exception $ex){ // error
                        $this->db->close();
			return false; // not found any data
		}
	
	}
 
	public function getAllEmpDataByLike($word){
		try{
			$this->load->database();
			$this->db->select('emp.id_emp, emp.emp_number, emp.name as empName, emp.surname, emp.address, emp.email, emp.tel, emp.sex, emp.date_start, emp.img_path,
							   per.id_permission, per.name as perName
							 ');
			$this->db->from('tbl_employee as emp');
			$this->db->join('tbl_permission as per', 'emp.id_permission = per.id_permission', 'left');
			$this->db->like('emp.emp_number',$word['emp_number'],'after');
			$this->db->like('emp.name', $word['name'], 'after');
			$this->db->like('emp.surname', $word['surname'], 'after');
			$this->db->order_by("emp.date_start","desc");
			$query = $this->db->get();
                        
			if($query->num_rows() == 0){ // error
                            throw new Exception();
			}else{
                            $this->db->close();
                            return $query->result();
                        }

		}catch(Exception $ex){ // error
                        $this->db->close();
			return false; // not found any data
		}
	}
	public function getEmpDataById($emp_id){
		try{
			$this->load->database(); // open database
			$this->db->select("tae.id_authen, tae.username, tae.password, tae.id_emp, te.emp_number, 
							   te.name, te.surname, te.address, te.email, te.tel, te.sex, te.date_start, te.img_path, te.id_permission");
			$this->db->from('tbl_authen_emp as tae');
			$this->db->join('tbl_employee as te', 'tae.id_emp = te.id_emp', 'left');
			@$this->db->where('tae.id_emp',$this->db->escape_str( intval($emp_id) ) );
			
			$query = $this->db->get(); // get data
			if($query->num_rows() == 0){ // error
				throw new Exception(); 
			}
                        $this->db->close();
			return $query->row();

		}catch(Exception $ex){
			//echo "error";
                        $this->db->close();
			return false;
		}
	}
	 
	public function insertEmpData($data){
		try{
			$this->load->database(); // open database
			$this->db->trans_begin(); // open transection 
			$this->db->insert('tbl_employee',$data['table1']);
			$data['table2']['id_emp'] = $this->db->insert_id();
			$this->db->insert('tbl_authen_emp',$data['table2']);
			
			if($this->db->trans_status() === false){ // error 
				throw new Exception();
			}else{
				$this->db->trans_commit(); // confirm insert
                                $this->db->close(); // close
				return true;
			}
		}catch(Exception $ex){
			$this->db->trans_rollback(); // rollback
                        $this->db->close(); // close
			return false;
		}
		
	
	}
	public function updateEmpData($id, $data){
		try{
			if($this->checkExistEmpById($id) == "0"){
				
				throw new Exception();
			}
			$this->load->database();    // open database
			
			$this->db->trans_begin(); // open transection 
			$this->db->where('id_emp',intval($id) );
			$this->db->update( 'tbl_employee', $data['table1'] ); 
			$this->db->where('id_emp',intval($id) );
			$this->db->update( 'tbl_authen_emp', $data['table2'] );
			
			if($this->db->trans_status() === false){
				throw new Exception(); // error 
			}else{
				$this->db->trans_commit(); // confirm insert
                                $this->db->close();  // close
				return true;
			}
		}catch(Exception $ex){
			$this->db->trans_rollback(); // rollback
                        $this->db->close(); // close
			return false;
		}
	} 
	public function deleteEmpData($emp_id){
		try{

			$this->load->database();
			$this->db->query("DELETE tae.*, te.* 
                                          FROM tbl_authen_emp as tae 
                                          LEFT JOIN tbl_employee as te 
                                          ON tae.id_emp = te.id_emp
                                          WHERE tae.id_emp = ".$this->db->escape(intval($emp_id) )." 
                                         ");
			if($this->checkExistEmpById($emp_id) != 0){ // data can't not delete yet
				throw new Exception();
			}
                        $this->db->close();
			return true;
		
		}catch(Exception $ex){
			$this->db->close();
			return false;
		}
	}
	public function checkExistEmpByCol($col){ // check data in tbl_employee is exist
		try{
			$this->load->database();
			$query = @$this->db->get_where('tbl_employee', $col);
			if($query->num_rows() > 0){
                            throw new Exception();
			}
                        $this->db->close();
			return true;
		}catch(Exception $ex){
                        $this->db->close();
			return false;
		}
	}
	public function checkExistEmpById($emp_id){ // check id emp in database
		try{
			$this->load->database();
			$this->db->select("tae.id_emp");
			$this->db->from('tbl_authen_emp as tae');
			$this->db->join('tbl_employee as te', 'tae.id_emp = te.id_emp', 'left');
			@$this->db->where('tae.id_emp',$this->db->escape_str( intval($emp_id) ) );
                        $this->db->close();
			return $query = $this->db->get()->num_rows();

		}catch(Exception $ex){
			$this->db->close();
			return false;
		}
	}

	public function getTotalRows(){ // get summary employee
		try{
			
			$this->load->database();
                        $query = $this->db->count_all_results('tbl_employee');       
                        $this->db->close();
			return $query;

		}catch(Exception $ex){
                        $this->db->close();
			return false; // not found any data
		}	
	}
	
} 

?>