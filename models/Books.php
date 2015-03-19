<?php
namespace Models;
class Books extends Model implements BooksRepositoryInterface
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
	public function getAllBiblio(){
		$sql='SELECT nom FROM biblio';
		$pdost = $this->connexion->query($sql);
		return $pdost->fetchAll();
	}
}