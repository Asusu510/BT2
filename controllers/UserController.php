<?php 
/**
 * 
 */
class UserController extends AdminController
{
	public $UserModel;
	public function __construct(){

		$this->setModel('User');
		$this->getModel();
		$this->UserModel = new User();
	} 
	
	public function index(){
		
		$users = $this->UserModel->getlist();

		return $this->view('users/index' , [
			'users'	 => $users
		]);
	}

	public function create(){
		return $this->view('users/create');
	}

	public function store(){

		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$error =[];

			$name = postInput('name');
	        $email = postInput('email');
	        $password = postInput('password');
	        $address = postInput('address');
	        $birthday = postInput('birthday');
	        $gender = postInput('gender');
	        $data = [
	            'name' => $name,
	            'email' => $email,
	            'password' => $password,
	            'address' => $address,
	            'birthday' => $birthday,
	            'gender' => $gender
	        ];

			foreach ($data as $key => $item){
				if(empty($item)) $error[$key] = $key.' không được để trống !';
			}
			
			if(empty($error)){
				$check = $this->UserModel->checkEmail($data['email']);

				if(!$check){
					$insert = $this->UserModel->insert($data);
					header("location: index.php?controllerName=UserController&action=index");
				}

				$_SESSION['error'] = 'Email đã tồn tại';
			}

			return $this->view('users/create', [
				'error' => $error,
			]);
		}
		
	}
	
	public function edit()
	{
		$id = getInput('id');

		$user = $this->UserModel->getID($id);

		return $this->view('users/edit',[
			'user' => $user,
		]);
	}

	public function update(){
		
		$id = getInput('id');

		$user = $this->UserModel->getID($id);

		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$error =[];

			$name = postInput('name');
	        $email = postInput('email');
	        $address = postInput('address');
	        $birthday = postInput('birthday');
	        $gender = postInput('gender');
	        $data = [
	            'name' => $name,
	            'email' => $email,
	            'address' => $address,
	            'birthday' => $birthday,
	            'gender' => $gender
	        ];

			foreach ($data as $key => $item){
				if(empty($item)) $error[$key] = $key.' không được để trống';
			}
			
			if(empty($error)){

				if($data['email'] == $user['email'])
				{
					$update = $this->UserModel->update($data, $id);
					header("location: index.php?controllerName=UserController&action=index");
				}else{

					$check = $this->UserModel->checkEmail($data['email']);

					if(!$check){
						$update = $this->UserModel->update($data, $id);
						header("location: index.php?controllerName=UserController&action=index");
					}

					$_SESSION['error'] = 'Email đã tồn tại';
					
				}
				
			}
			return $this->view('users/edit', [
				'error' => $error,
				'user' => $user,
			]);
		}
	}

	public function delete(){

		$id = getInput('id');
		$this->UserModel->delete($id);
		header("location: index.php?controllerName=UserController&action=index");
	}

}
