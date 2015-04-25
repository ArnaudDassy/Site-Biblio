<?php
namespace Models;
interface BooksRepositoryInterface
{ 
	public function getBooks();
	public function getAuteur($id);
	public function getMaison($id);
	public function getType($id);
	public function getGenre($id);
	public function getBiblio($id);
	public function getBooksByCriterion($genre,$id);
	public function getNameOfCriterion($genre,$id);
}