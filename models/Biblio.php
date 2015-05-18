<?php
namespace Models;
class Biblio extends Model implements BiblioRepositoryInterface
{
	public function getBiblios(){
		$sql='SELECT * FROM biblio';
		$pdost = $this->connexion->query($sql);
		return $pdost->fetchAll();
	}
}
