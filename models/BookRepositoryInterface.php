<?php
namespace Models;
interface BookRepositoryInterface
{ 
	public function getBook($id);
	public function getAuteur($id);
	public function getMaison($id);
	public function getType($id);
	public function getGenre($id);
	public function getBiblio($id);

}