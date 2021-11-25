<?php

class Model {

	public function __construct() {

		$this->db = new Database;

	}


	public function getSystemID($id,$user_type){

			$system_id = '';

			if($user_type == "STAFF"){

		$queryUser = $this->db->queryDB("SELECT id FROM staff WHERE staff_id = '$id'");

		while($row = mysqli_fetch_array($queryUser)){

		 $system_id = $row['id'];

		}
			}
			else {

				$queryUser = $this->db->queryDB("SELECT account_id FROM accounts WHERE email = '$id'");

				while($row = mysqli_fetch_array($queryUser)){

		 $system_id = $row['account_id'];

		}
			}



		return $system_id;

	}


      public function options($option_name){

        $option = '';

        $query = $this->db->queryDB("SELECT value FROM config WHERE setting = '$option_name'");

        while($row = mysqli_fetch_assoc($query)){

            $option = $row['value'];
        }
        return $option;
    }

    public function getOption($option){

        $option = $this->options($option);

        return $option;

    }

 public function user_roles($id){

		$info = array();

		$id = $this->db->escapeString($id);

		  $rawQuery = "SELECT * FROM user_role where user_id = '$id'";

	  $query = $this->db->queryDB($rawQuery);

	  while($row = mysqli_fetch_array($query)){

		$role = $row['role_id'];


		$info[] = array("role"=>$role);

	  }


	  return $info;

	}

        public function edit_system_user($id){

		$user = array();

	 $rawQuery = "SELECT * FROM staff INNER JOIN user ON staff.staff_id = user.user_id WHERE staff.staff_id = '".$id."'";

		$query  =  $this->db->queryDB($rawQuery);

		while($row = mysqli_fetch_array($query)){

			$user['username']   = $row['staff_id'];

			$user['name']      = $row['name'];

            $user['email']      = $row['email'];

            $user['password']      = $row['password'];

			$user['status']    = $row['status'];



		}

		return $user;

	}


	//takes a mysql row set and returns an associative array, where the keys

	//in the array are the column names in the row set. If singleRow is set to

	//true, then it will return a single row instead of an array of rows.

	public function processRowSet($rowSet, $singleRow=false)

	{

		$resultArray = array();

		while($row = mysql_fetch_assoc($rowSet))

		{

			array_push($resultArray, $row);

		}



		if($singleRow === true)

			return $resultArray[0];



		return $resultArray;

	}



	//Select rows from the database.

	//returns a full row or rows from $table using $where as the where clause.

	//return value is an associative array with column names as keys.

	public function select($table, $column,$where) {

		$sql = "SELECT * FROM $table WHERE $column = $where";

		$result = mysql_query($sql);

		if(mysql_num_rows($result) == 1)

			return $this->processRowSet($result, true);



		return $this->processRowSet($result);

	}



	//Updates a current row in the database.

	//takes an array of data, where the keys in the array are the column names

	//and the values are the data that will be inserted into those columns.

	//$table is the name of the table and $where is the sql where clause.

	public function update($data, $table,$tablecolumn, $where) {

		$sql = '';

		/*foreach ($data as $column => $value) {

		$sql = "UPDATE $table SET $column = '$value' WHERE $tablecolumn = '$where'";

		$result = $this->db->queryDB($sql);

	    } */

		$sql .= "UPDATE $table SET ";

		foreach ($data as $column => $value) {

			$sql .= "$column = $value, ";

		}
		//echo substr($sql, 0, -1);
		$sql = rtrim($sql,' , ');

		$sql .=  " WHERE $tablecolumn = $where";

		echo $sql;

		$result = $this->db->queryDB($sql);


		//echo $sql;
			//or die(mysqli_error());
		//$sql1 .= "UPDATE $table SET $column = $value WHERE $tablecolumn = '$where'";

		if(!$result){

			$feedback = "False";

		}

		else

		{

			$feedback = "Success";

		}

		return $feedback;

	}



	//Inserts a new row into the database.

	//takes an array of data, where the keys in the array are the column names

	//and the values are the data that will be inserted into those columns.

	//$table is the name of the table.

	public function insert($data, $table) {

		$columns = "";

		$values = "";

		foreach ($data as $column => $value) {

			$columns .= ($columns == "") ? "" : ", ";

			$columns .= $column;

			$values .= ($values == "") ? "" : ", ";

			$values .= $value;

		}

		$sql = "insert into $table ($columns) values ($values)";
//echo $sql;
		$query = $this->db->queryDB($sql);

		//echo $sql;

        if(!$query){

         return "Error";

		}
		else {

		  //return the ID of the user in the database.
		$response['id'] = $this->db->insert_id();

			 $response['message'] = "success";

			return  $response;

		}



	}



	public function delete($table,$column,$where)

	{

		mysql_query("DELETE FROM $table WHERE $column = '$where'");

		//return true;

	}

	public function describe($table){

	$sql = "DESCRIBE $table";

	$query = $this->db->queryDB($sql);

	return $query;

	}

	  function logdata($username,$task,$oldvalue,$newvalue)
       {
        $time = date("F j, Y, g:i a");

         if($oldvalue!=""){$oldvalue="Oldvalue: $oldvalue";}
          if($newvalue!=""){$newvalue="newvalue: $newvalue";}

            /*
            $fr=explode("/",$username);
            if($fr[1]!="")
            {
             $filename=md5(strtoupper($fr[1]));
             $filename=BASE_URL."log/$filename.txt";
             $username=$fr[1];
            }
            else
            {*/
             $filename=md5(strtoupper($username));
             $filename="log/$filename.txt";
             //}

		   $somecontent="$time: $username $task $oldvalue  $newvalue\r\n";
           $handle=fopen ($filename,'a');
           fwrite($handle, $somecontent);
           fclose($handle);
          }

           public function add_action($action,$module,$id,$user_id,$description){
		     $date = date('Y-m-d h:i:s');
			 $number = 1;
             $data = array(

						 "target_type"=>"'".$module."'",
						 "data"=>"'".$description."'",
						 "action"=>"'".$action."'",
						 "created_at"=>"'".$date."'",
						 "ip_address"=>"''",
						 "target_id"=>"'".$id."'",
						 "user_id"=>"'".$user_id."'"
						 );

						 $this->insert($data, "action_history_record");

           }

		      public function add_note($data_insert,$type,$target_type,$post,$parent_id,$parent_type,$user_id){

		     $date = date('Y-m-d h:i:s');

			 $number = 1;

             $data = array(
			             "post"=>"'".$post."'",
						 "data"=>"'".$data_insert."'",
						 "type"=>"'".$type."'",
						 "target_type"=>"'".$target_type."'",
						 "created_at"=>"'".$date."'",
						 "modified_at"=>"'".$date."'",
						 "parent_id"=>"'".$parent_id."'",
						 "parent_type"=>"'".$parent_type."'",
						 "created_by_id"=>"'".$user_id."'"
						 );


						 $this->insert($data, "note");

           }


}
