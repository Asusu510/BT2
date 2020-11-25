<?php


/**
 * 
 */
class User extends Model
{
		
	protected $tableName = "users";
	protected $primaryKey = "id";
	protected $alias ="users";

	public function __construct() {
		$this->connect();
	}


	public function getList() {
		$data = [];
        $sql = "SELECT * FROM $this->tableName ";
        $result = mysqli_query($this->_conn, $sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                 $data[] = $row;
           }
        }
        return $data;
	}

    public function getID($id){
        
        $sql = "SELECT * FROM $this->tableName WHERE $this->primaryKey = $id";
        $result = mysqli_query($this->_conn, $sql);
        return mysqli_fetch_assoc($result);
    }

	public function insert(array $data){
		$cols = implode(',',array_keys($data));
        $values = implode("', '",array_values($data));
        $values ="'".$values."'";
        $sql ="INSERT INTO $this->tableName($cols) VALUES($values)";

        return mysqli_query($this->_conn, $sql);
	}

	public function delete($id){

		$sql = "DELETE FROM $this->tableName WHERE $this->primaryKey = $id";
        mysqli_query($this->_conn, $sql);
        return mysqli_affected_rows($this->_conn);
	}

	public function update( array $data, $id){
        $sql = "UPDATE $this->tableName SET ";
        foreach($data as $key => $value){
            $sql .= " $key = '$value' , ";
        }

        $sql = rtrim($sql, ' ,');
        $sql .= " WHERE $this->primaryKey = $id ";
        mysqli_query($this->_conn, $sql);
        return mysqli_affected_rows($this->_conn);  
    }


    public function checkEmail($email){
        $sql = "SELECT * FROM $this->tableName WHERE email = '$email' ";
        $result = mysqli_query($this->_conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function checkLogin($email, $password){
        $sql = "SELECT * FROM $this->tableName WHERE email = '$email' AND password = '$password' ";
        $result = mysqli_query($this->_conn, $sql);
        return mysqli_fetch_assoc($result);
    }


}