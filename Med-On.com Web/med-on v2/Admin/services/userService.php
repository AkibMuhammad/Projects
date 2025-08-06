<?php
	
	require_once('../db/db.php');
	
	
	function getAllCity(){
		$con = DBconnect();
		$sql = "select * from appointment";
		$result = mysqli_query($con, $sql);
		$apps =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($apps, $row);
		};
		return $apps;
	}
	
	function getCity($id){
		$con = DBconnect();
		$sql = "select * from appointment where id ='{$id}'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	

	function SearchByUsername($username){
		$con = DBconnect();
		$sql = "select * from serials where username ='{$username}'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function SearchByEmployee($username){
		$con = DBconnect();
		$sql = "select * from jobseeker_reg where username ='{$username}'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getJobs($id){
		$con = DBconnect();
		$sql = "select * from job where id ='{$id}'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getFeedback(){
		$con = DBconnect();
		$sql = "select * from feedback";
		$result = mysqli_query($con, $sql);
		$feedbacks =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($feedbacks, $row);
		};
		return $feedbacks;
	}

	// function deleteJob($id){
	// 	$con = DBconnect();
	// 	$sql = "delete from job where id='{$id['id']}'";


	// 	if(mysqli_query($con, $sql)){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }
	
	function AdminProfile($username){
		$con = DBconnect();
		$sql = "select * from superadminlogin where username ='{$username}'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getByUsername($username){
		$con = DBconnect();
		$sql = "select * from serials where username ='{$username}'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getEmployeeByUsername($username){
		$con = DBconnect();
		$sql = "select * from jobseeker_reg where username ='{$username}'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	
	
	function getAllUser(){
		$con = DBconnect();
		$sql = "select * from serials";
		$result = mysqli_query($con, $sql);
		$users =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		};
		return $users;
	}

	function getAllEmployee(){
		$con = DBconnect();
		$sql = "select * from jobseeker_reg";
		$result = mysqli_query($con, $sql);
		$users =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		};
		return $users;
	}

	// function getAllJobs(){
	// 	$con = DBconnect();
	// 	$sql = "select * from job";
	// 	$result = mysqli_query($con, $sql);
	// 	$users =[];
	// 	while($row = mysqli_fetch_assoc($result)){
	// 		array_push($users, $row);
	// 	};
	// 	return $users;
	// }

	function getApprovedJobs(){
		$con = DBconnect();
		$sql = "select * from job where permission = 'OK'";
		$result = mysqli_query($con, $sql);
		$users =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		};
		return $users;
	}

	function validate ($user){
		$con = DBconnect();
		$sql = "select * from superadminlogin where username='{$user['username']}' and password='{$user['password']}'";

		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);

		if(count($row) > 0){
			return true;
		}else{
			return false;
		}
	}


	function createEmployerByAdmin($user){
		$con = DBconnect();
		$sql = "insert into serials values('{$user['name']}', '{$user['username']}', '{$user['email']}', '{$user['password']}')";


		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function createNews($user){
		$con = DBconnect();
		$sql = "insert into news values('{$user['date']}','{$user['topic']}', '{$user['details']}')";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function addCity($appointment){
		$con = DBconnect();
		$sql = "insert into appointment values('{$appointment['appointment']}')";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}




	function AdminInfoUpdate($user){
		$con = DBconnect();
		$sql = "update superadminlogin set name='{$user['name']}', username='{$user['username']}', email='{$user['email']}', password='{$user['password']}' where username='{$user['username']}'";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function CityUpdate($user){
		$con = DBconnect();
		$sql = "update book set book='{$user['book']}'";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}


	function updateEmployee($user){
		$con = DBconnect();
		$sql = "update jobseeker_reg set name='{$user['name']}', username='{$user['username']}', email='{$user['email']}',password='{$user['password']}' where username='{$user['username']}'";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function updateEmployer($user){
		$con = DBconnect();
		$sql = "update serials set name='{$user['name']}', username='{$user['username']}', email='{$user['email']}',password='{$user['password']}' where username='{$user['username']}'";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}

	}

	function updateJob($user){
		$con = DBconnect();
		$sql = "update job set name='{$user['name']}', id='{$user['id']}',provider='{$user['provider']}', description='{$user['description']}',salary='{$user['salary']}' where id='{$user['id']}'";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}

	}

	function deleteCity($id){

		$con = DBconnect();
		$sql = "delete from appointment where id='{$id['id']}'";


		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function deleteEmployee($user){

		$con = DBconnect();
		$sql = "delete from jobseeker_reg where username='{$user['username']}'";


		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function deleteEmployer($user){
		
		$con = DBconnect();
		$sql = "delete from serials where username='{$user['username']}'";


		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	

	function approve($user){
		$con = DBconnect();
		$sql = "update job set permission='OK' where id={$user['id']}";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}



?>