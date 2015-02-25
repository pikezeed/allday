<?php 
class Login_emp_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}


	public function verifyEmp($username, $password){
		try{
			$this->load->database(); // open database
			$this->db->select('a_emp.id_authen, a_emp.username, a_emp.password, per.id_permission, per.name as name_permission');
			$this->db->from('tbl_authen_emp a_emp');
			$this->db->join('tbl_employee as emp', 'a_emp.id_emp = emp.id_emp', 'left');
			$this->db->join('tbl_permission as per', 'emp.id_permission = per.id_permission', 'left');
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$query = $this->db->get(); // get data
			$this->db->close(); // close database
			if($query -> num_rows() == 1) // success
			{
                            
				return $query;
			}else{
				return false;
			}

		}catch(Exception $ex){ // error
			
                        $this->db->close();
			return false;
		}
	}

	public function getPermission($id){
		try{
			$this->load->database(); // open database
			$this->db->select('p.id_permission as perId, p.name as perName, 
							  r.id_role as roleId, r.name as roleName');
			$this->db->from('tbl_permission as p');
			$this->db->join('tbl_permission_role as pr', 'p.id_permission = pr.id_permision', 'left');
			$this->db->join('tbl_role as r', 'pr.id_role =  r.id_role', 'left');
			$this->db->where('id_permission', intval($id));
			$query = $this->db->get(); // get data
                        $this->db->close(); // close database
			if($query -> num_rows() != 0){ // success
				return $query;
			}else{
				return false;
			}

		}catch(Exception $ex){
                    $this->db->close();
			
			return false;
		}
	}

	

}

?>