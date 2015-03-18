<?php
namespace Models;
class Posts extends Model
{ 
	public function getPost($id){
		$sql= 'SELECT * FROM livre WHERE livre.id = :id';
		$res = $this->connexion->prepare($sql);
		$res->execute([':id' => $id]);
		return $res->fetch();
	}
	public function getBooks(){
		$sql ='SELECT * FROM livre ORDER BY id DESC';
		$res= $this->connexion->query($sql);
		return $res->fetchAll();
	}
	public function getAuteur($id){
		$sql ="SELECT nom FROM auteur INNER JOIN livre ON livre.auteur_id=auteur.id WHERE auteur_id=:id";;
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':id' => $id]);
		return $pdost->fetch();
	}
	public function getMaison($id){
		$sql ='SELECT nom FROM maison INNER JOIN livre ON livre.maison_id=maison.id WHERE maison_id=:id';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':id' => $id]);
		return $pdost->fetch();
	}
	public function getType($id){
		$sql ='SELECT nom FROM type INNER JOIN livre ON livre.type_id=type.id WHERE type_id=:id';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':id' => $id]);
		return $pdost->fetch();
	}
	public function getGenre($id){
		$sql ='SELECT nom FROM genre INNER JOIN livre ON livre.genre_id=genre.id WHERE genre_id=:id';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':id' => $id]);
		return $pdost->fetch();
	}
	public function getBiblio($id){
		$sql ='SELECT nom FROM biblio INNER JOIN livre ON livre.biblio_id=biblio.id WHERE biblio_id=:id';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':id' => $id]);
		return $pdost->fetch();
	}
	public function getCategories(){
		$sql ='SELECT * FROM categories';
		$res=$this->connexion->query($sql);
		return $res->fetchAll();
	}
	public function createMessage($signature,$body,$category){
		$sql = 'INSERT INTO messages (signature, body,id_cat_message) VALUES (:signature,:body,:id_cat_message)';
		$sqlIdCategory = "SELECT id_cat FROM categories WHERE name_cat='$category'";
		$resSqlIdCategory = $this->connexion->query($sqlIdCategory);
		$resFetchSqlIdCategory = $resSqlIdCategory->fetch();
		try{
		$res = $this->connexion->prepare($sql);
		$res->execute([':signature' => $signature, ':body' => $body,':id_cat_message' => $resFetchSqlIdCategory['id_cat']]);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function createCategory($name_cat){
		$sql = 'INSERT INTO categories (name_cat) VALUES (:name_cat)';
		try{
		$res = $this->connexion->prepare($sql);
		$res->execute([':name_cat' => $name_cat]);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function deleteMessage($id){
		$sql="DELETE FROM golden2.messages WHERE messages.id= :id";
		try{
		$res = $this->connexion->prepare($sql);
		$res->execute([':id' => $id]);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function modifyMessage($signature,$body,$id,$category){
		$sql = "UPDATE golden2.messages SET signature = :signature, body = :body,id_cat_message = :id_cat_message WHERE messages.id= :id";
		$sqlIdCategory = "SELECT id_cat FROM categories WHERE name_cat=:category";
		try{

			$resSqlIdCategory = $this->connexion->prepare($sqlIdCategory);
			$resSqlIdCategory->execute([':category' => $category]);
			$resFetchSqlIdCategory = $resSqlIdCategory->fetch();

			$res = $this->connexion->prepare($sql);
			$res->execute([':signature' => $signature, ':body' => $body, ':id' => $id,':id_cat_message' => $resFetchSqlIdCategory['id_cat']]);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function getMessagesParCat($id){
		$sql="SELECT * FROM `messages` INNER JOIN `categories` ON messages.id_cat_message=categories.id_cat WHERE messages.id_cat_message=:id ORDER BY id DESC";
		$res = $this->connexion->prepare($sql);
		$res->execute([':id' => $id]);
		return $res->fetchAll();
	}
	public function getTheCategory($idCat){
		$sql = "SELECT name_cat FROM categories INNER JOIN messages ON messages.id_cat_message=categories.id_cat WHERE id_cat=:id";
		$res = $this->connexion->prepare($sql);

		$res->execute([':id' => $idCat]);
		return $res->fetch();;
	}
	public function getUser($email,$password){
		$sql='SELECT * FROM users WHERE email=:email AND password=:password';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':email' => $email, 'password' => $password]);
		return $pdost->fetch();
	}
	public function createUser($email,$password){
		$sql='INSERT INTO users (email,password) VALUES (:email,:password)';
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
		$sql='SELECT * FROM users WHERE email=:email AND password=:password';
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
		$sql='SELECT email FROM users WHERE email=:email';
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