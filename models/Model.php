<?php


/**
 * 
 */
class Model 
{
	protected $_conn ;
	
	public function connect(){
		$this->_conn = mysqli_connect('localhost', 'root', '', 'db_task2') 
                or die ('Không thể kết nối CSDL');
        mysqli_set_charset($this->_conn, 'UTF-8');
	}


}