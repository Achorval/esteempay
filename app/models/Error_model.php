<?php 

class Error_Model extends Model {
	
	public function __construct() {
		
		parent::__construct();
		
	}
	
	function ModuleAccess($UserID,$Module){
	
	$info = array();
		
	if($this->IsSuperAdmin()){
		
		$info['Access'] = "Enabled";
	
	$info['CreateData'] = "Enabled";
	
	$info['ReadData'] = "Enabled";
	
	$info['UpdateData'] = "Enabled";
	
	$info['DeleteData'] = "Enabled";
	
	return $info;
	
	}
	
	$UserID = $this->db->escapeString($UserID);
	
	$Module = $this->db->escapeString($Module);
	
	$sql = $this->db->queryDB("SELECT ModuleID FROM modules WHERE Module = '$Module'");
	
	if($sql->num_rows>0){
	
	while($row = mysqli_fetch_array($sql)){
	
	$ModuleID = $row['ModuleID'];	
		
	}
	}
	
	else {
	
	return $info;	
		
	}
	
	$sql = $this->db->queryDB("SELECT RoleID FROM user_role WHERE UserID = '$UserID'");
	
	if($sql->num_rows>0){
	
	$sql = $this->db->queryDB("SELECT * FROM user_role WHERE UserID = '$UserID'");  	
	
	while($row = mysqli_fetch_assoc($sql)){
		
	$RoleID = $row['RoleID'];
	
	}
		
	}
	
	else {
	
	return $info;	
		
	}
	
	$sql = $this->db->queryDB("SELECT * FROM role_module_permissions WHERE ModuleID = '$ModuleID' AND RoleID = '$RoleID'");
	
	while($row = mysqli_fetch_assoc($sql)){
	
	$info['Access'] = $row['Access'];
	
	$info['CreateData'] = $row['CreateData'];
	
	$info['ReadData'] = $row['ReadData'];
	
	$info['UpdateData'] = $row['UpdateData'];
	
	$info['DeleteData'] = $row['DeleteData'];
		
		
	}
	
	return $info;
	
	}
	
	
}