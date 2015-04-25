<?php
namespace Models;
class Book extends Model implements BookRepositoryInterface
{ 
	public function getPost($id){
		$sql= 'SELECT * FROM livre WHERE livre.id = :id';
		$res = $this->connexion->prepare($sql);
		$res->execute([':id' => $id]);
		return $res->fetch();
	}
	public function getBook($id){
		$sql ='SELECT * FROM livre WHERE id=:id';
		$res= $this->connexion->prepare($sql);
		$res->execute([':id' => $id]);
		return $res->fetchAll();
	}
	public function getAuteur($id){
		$sql ="SELECT * FROM auteur INNER JOIN livre ON livre.auteur_id=auteur.id WHERE auteur_id=:id";;
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':id' => $id]);
		return $pdost->fetch();
	}
	public function getMaison($id){
		$sql ='SELECT * FROM maison INNER JOIN livre ON livre.maison_id=maison.id WHERE maison_id=:id';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':id' => $id]);
		return $pdost->fetch();
	}
	public function getType($id){
		$sql ='SELECT * FROM type INNER JOIN livre ON livre.type_id=type.id WHERE type_id=:id';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':id' => $id]);
		return $pdost->fetch();
	}
	public function getGenre($id){
		$sql ='SELECT * FROM genre INNER JOIN livre ON livre.genre_id=genre.id WHERE genre_id=:id';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':id' => $id]);
		return $pdost->fetch();
	}
	public function getBiblio($id){
		$sql ='SELECT * FROM biblio INNER JOIN livre ON livre.biblio_id=biblio.id WHERE biblio_id=:id';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':id' => $id]);
		return $pdost->fetch();
	}
	public function testExist($valeur,$table){
		$sql='SELECT nom FROM '.$table.' WHERE nom=:valeur';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':valeur' => $valeur]);
		$test=$pdost->fetch();
		if(empty($test)){
			$sql='INSERT INTO '.$table.' (nom) VALUES (:valeur)';
			$pdost = $this->connexion->prepare($sql);
			$pdost->execute([':valeur' => $valeur]);
		}
		else{
			return $test;
			return true;
		}
	}
	public function convert($valeur,$table){
		$sql='SELECT id FROM '.$table.' WHERE nom=:valeur';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':valeur' => $valeur]);
		return $pdost->fetch();
	}
	public function createLivre($auteur,$genre,$maison,$type,$biblio,$body,$title,$note){
		$sql = 'INSERT INTO livre (auteur_id,genre_id,maison_id,type_id,biblio_id,body,nom,note) VALUES (:auteur,:genre,:maison,:type,:biblio,:body,:title,:note)';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':auteur' => $auteur['id'], ':genre' => $genre['id'],':maison' => $maison['id'], ':type' => $type['id'],':biblio' => $biblio['id'], ':body' => $body,':title' => $title, ':note' => $note]);
	}
	public function lastBookID(){
		$sql='SELECT max(id) from livre';
		$pdost = $this->connexion->query($sql);
		return $pdost->fetch();
	}
	public function getAllBiblio(){
		$sql='SELECT * FROM biblio';
		$pdost = $this->connexion->query($sql);
		return $pdost->fetchAll();
	}
	public function updateLivre($auteur,$genre,$maison,$type,$biblio,$body,$title,$note,$id){
		$sql = "UPDATE biblio.livre SET auteur_id = :auteur, genre_id = :genre,maison_id = :maison,type_id = :type, biblio_id = :biblio,body = :body, nom= :title,note = :note WHERE livre.id= :id";
		try{
			$res = $this->connexion->prepare($sql);
			$res->execute([
				':auteur' => $auteur['id'],
				':genre' => $genre['id'],
				':maison' => $maison['id'],
				':type' => $type['id'],
				':biblio' => $biblio['id'],
				':body' => $body,
				':title' => $title,
				':note' => $note,
				':id' => $id]);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function deleteBook($id){
		$sql="DELETE FROM biblio.livre WHERE livre.id= :id";
		try{
		$res = $this->connexion->prepare($sql);
		$res->execute([':id' => $id]);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function getBooksByCriterion($genre,$id){
		return 'hello';
	}
}