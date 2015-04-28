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
		$test=$pdost->fetchAll();
		if(empty($test)){
			return false;
		}
		else{
			return $test;
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
	public function getUserByName($email){
		$sql='SELECT * FROM users WHERE user_name=:email';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':email' => $email]);
		return $pdost->fetch();
	}
	public function updateUser($user,$data){
		$sql = "UPDATE biblio.users SET adress_city = :city, adress_postal_code = :postal_code,adress_street = :street,avatar_path = :avatar, email = :email,first_name = :first_name, last_name= :last_name WHERE users.user_name= :user_name";
		try{
			$res = $this->connexion->prepare($sql);
			$res->execute([
				':city' => $data['city'],
				':postal_code' => $data['postalCode'],
				':street' => $data['street'],

				':avatar' => $data['street'],

				':email' => $data['email'],
				':first_name' => $data['firstName'],
				':last_name' => $data['lastName'],
				':user_name' => $user]);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
}
