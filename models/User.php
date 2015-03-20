<?php 
namespace Models;
class User extends Model implements UserRepositoryInterface{
	public function getUser($email,$password){
		$sql='SELECT * FROM users WHERE user_name=:email AND password=:password';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':email' => $email, 'password' => $password]);
		return $pdost->fetch();
	}
	public function createUser($email,$password){
		$sql='INSERT INTO users (user_name,password) VALUES (:email,:password)';
		try{
			$pdost = $this->connexion->prepare($sql);
			$pdost->execute([':email' => $email, 'password' => $password]);
			return true;
		}
		catch(PDOException $e){
			return false;
		}
	}
	public function verifyUser($login,$mdp){
		$sql='SELECT * FROM users WHERE user_name=:email AND password=:password';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':email' => $login, 'password' => $mdp]);
		$test=$pdost->fetch();
		if(empty($test)){
			return false;
		}
		else{
			return $test;
			return true;
		}
	}
	public function verifyIfUserExist($login){
		$sql='SELECT email FROM users WHERE user_name=:email';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':email' => $login]);
		if(empty($test)){
			return false;
		}
		else{
			return true;
		}
	}
}