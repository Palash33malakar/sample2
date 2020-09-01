<?php


include'library/Database.php';



	class User{
		
		private $db;
		 function __construct()
		{
			$this->db=new Database();

		}
//Registration method
		public function regisData($data){

			$name=$data['Name'];
			$email=$data['Email'];
			$userName=$data['Username'];
			$pass=$data['Password'];
			$checkSum=$this->checkSum($email);



			if($name=='' || $email=='' || $userName =='' ||  $pass==''){

				$meg='<div class="alert alert-danger"><strong>Eorro!</strong> Field is empty</div>';
				return $meg;
			}

			if(strlen($userName)<6){

				$meg='<div class="alert alert-danger"><strong>Eorro!</strong> Password must be greater than 6 digit</div>';
				return $meg;
			}elseif (preg_match('/[^a-z0-9_-]+/i',$userName)) {
				$meg='<div class="alert alert-danger"><strong>Eorro!</strong> Username must only contain alphanumericecal,Dashes and underscores!</div>';
				return $meg;
			}
			if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){

				$meg='<div class="alert alert-danger"><strong>Eorro!</strong> Email is empty</div>';
				return $meg;
			}

			if($checkSum===true){

				
				$meg='<div class="alert alert-danger"><strong>Eorro!</strong> this email adress is onne time exits match!</div>';
				return $meg;


			}


			

			$sql="insert into registrationinformation(Name,userName,Email,Password)values(:name,:userName,:email,:password)";

			$squery=$this->db->pdo->prepare($sql);
			$squery->bindValue(':name',$name);
			$squery->bindValue(':userName',$userName);
			$squery->bindValue(':email',$email);
			$squery->bindValue(':password',$pass);
			$result=$squery->execute();
			
			if($result){
				$meg='<div class="alert alert-success"><strong>Eorro!</strong> Update data is succcessful exits"</div>';
				return $meg;
				
			}else{
				$meg='<div class="alert alert-danger"><strong>Thank you!</strong> insert data is not succcessful exits"</div>';
				return $meg;
				
			}
			

		}
		

			 function checkSum($email){


				$sql="select Email from registrationinformation where Email=:email";
				$q=$this->db->pdo->prepare($sql);
				$q->bindValue(':email',$email);
				$q->execute();
				if($q->rowCount() >0){
				return true;
				}else{
					return false;
				}

			}


       //login method

    public function getLoginUser($email,$pass){
    	$sql="Select * from  registrationinformation where Email=:email and Password=:password limit 1";
    	$squery=$this->db->pdo->prepare($sql);
    	$squery->bindValue(':email',$email);
    	$squery->bindValue(':password',$pass);
    	$squery->execute();
    	$result=$squery->fetch(PDO::FETCH_OBJ);
    	return $result;
    }



	    public function loginData($loginData){

				$email=$loginData['email'];
				$pass=$loginData['password'];



				$checkSum=$this->checkSum($email);



			if($email=='' ||  $pass==''){

				$meg='<div class="alert alert-danger"><strong>Eorro!</strong> Field is empty</div>';
				return $meg;
			}

			if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){

				$meg='<div class="alert alert-danger"><strong>Eorro!</strong> Email is empty</div>';
				return $meg;
			}

			if($checkSum===false){

				
				$meg='<div class="alert alert-danger"><strong>Eorro!</strong> Email adress is not matach</div>';
				return $meg;


			}

			$result=$this->getLoginUser($email,$pass);
			if ($result) {
				Session::init();
				Session::set('login',true);
				Session::set('Id',$result->Id);
				Session::set('Name',$result->Name);
				Session::set('Username',$result->Username);
				Session::set('loginmsg','<div class="alert alert-success"><strong>Eorro!</strong> You are logined!</div>');
					header('location:index.php');

				
			}else{
				$meg='<div class="alert alert-info"><strong>Eorro!</strong>Your Email is not found!</div>';
				return $meg;

			}
    

				
	     }		



public function getUserData(){
	$sql="Select * from  registrationinformation order by Id DESC";
    	$squery=$this->db->pdo->prepare($sql);	
    	$squery->execute();
    	$result=$squery->fetchAll();
    	return $result;

}


			public function getUserById($yy){

				$sql="Select * from  registrationinformation where Id=:id limit 1";
			    	$squery=$this->db->pdo->prepare($sql);
			    	$squery->bindValue(':id',$yy);
			    	
			    	$squery->execute();
			    	$result=$squery->fetch(PDO::FETCH_OBJ);
			    	return $result;

			}
			Public function updatUser($fff,$data){

				$name=$data['Name'];
				$email=$data['Email'];
				$userName=$data['Username'];
					
					



					if($name=='' || $email=='' || $userName ==''){

						$meg='<div class="alert alert-danger"><strong>Eorro!</strong> Field is empty</div>';
						return $meg;
					}

					if(strlen($userName)<6){

						$meg='<div class="alert alert-danger"><strong>Eorro!</strong> Password must be greater than 6 digit</div>';
						return $meg;
					}elseif (preg_match('/[^a-z0-9_-]+/i',$userName)) {
						$meg='<div class="alert alert-danger"><strong>Eorro!</strong> Username must only contain alphanumericecal,Dashes and underscores!</div>';
						return $meg;
					}
					if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){

						$meg='<div class="alert alert-danger"><strong>Eorro!</strong> Email is empty</div>';
						return $meg;
					}

					



						$sql="Update registrationinformation set
							 Name=:name,
							 Username=:username,
							 Email=:email
							 where Id=:id";

						$squery=$this->db->pdo->prepare($sql);
						$squery->bindValue(':name',$name);
						$squery->bindValue(':userName',$userName);
						$squery->bindValue(':email',$email);
						$squery->bindValue(':id',$fff);
						$result=$squery->execute();
						
						if($result){
							$meg='<div class="alert alert-success"><strong>Sucess!</strong> Update data is succcessful exits"</div>';
							return $meg;
							
						}else{
							$meg='<div class="alert alert-danger"><strong>Thank you!</strong> insert data is not succcessful exits"</div>';
							return $meg;
							
						}


			}

		
	}
?>