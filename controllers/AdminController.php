<?php 

/**
 * 
 */
class AdminController
{
	protected $_model;
	

	public function index(){
		
	}

	public function create(){

	}

	public function update(){

	}

	public function delete(){
		
	}

	public function setModel($model){
		$this->_model = $model;
	}

	public function getModel(){
		return require('models/'.$this->_model.'.php');
	}
	
	public function view($path, array $data = [] )
	{
		
		foreach ($data as $key => $value){
			$$key = $value;
		}
		$path = 'views/'.$path . '.php';
		
		 require($path);
	}


}