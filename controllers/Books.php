<?php
namespace Controllers;
class Books extends Base
{
	private $postsModel = null;
	public function __construct(\Models\Books $booksModel)
	{
		$this->postsModel = $booksModel;
	}

	public function index(){
		
		//Je récupère les 5 derniers livres
		$data=[];
		$data['data'] = $this->postsModel->getBooks();
		for ($i=0; $i<5; $i++) {
		$data['data']['auteur'][$i]=$this->postsModel->getAuteur($data['data'][$i]['auteur_id']);
		$data['data']['maison'][$i]=$this->postsModel->getMaison($data['data'][$i]['maison_id']);
		$data['data']['type'][$i]=$this->postsModel->getType($data['data'][$i]['type_id']);
		$data['data']['genre'][$i]=$this->postsModel->getGenre($data['data'][$i]['genre_id']);
		$data['data']['biblio'][$i]=$this->postsModel->getBiblio($data['data'][$i]['biblio_id']);
		}
		$data['view'] ='default.php';
		return $data;
	}
	public function view(){

		//Je récupère TOUS les livres
		$data=[];
		$data['view'] ='view_books.php';
		$data['biblio']=$this->postsModel->getAllBiblio();
		$data['id']=0;
		$data['data']['books'] = $this->postsModel->getBooks();
		for ($i=0; $i<count($data['data']['books']); $i++) {
		$data['data']['auteur'][$i]=$this->postsModel->getAuteur($data['data']['books'][$i]['auteur_id']);
		$data['data']['maison'][$i]=$this->postsModel->getMaison($data['data']['books'][$i]['maison_id']);
		$data['data']['type'][$i]=$this->postsModel->getType($data['data']['books'][$i]['type_id']);
		$data['data']['genre'][$i]=$this->postsModel->getGenre($data['data']['books'][$i]['genre_id']);
		$data['data']['biblio'][$i]=$this->postsModel->getBiblio($data['data']['books'][$i]['biblio_id']);
		}
		return $data;
	}

	public function filter(){
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$data=[];
			$genre=$_GET['kind'];
			$id=$_GET['id'];

			//Je récupère tous les livres basés sur la table: $_GET['kind'] et je choisis lequel est ciblé grâce à: $_GET['id']
			$data['livres'] = $this->postsModel->getBooksByCriterion($genre,$id);

			//Je récupère le nominatif du dit critère
			$data['filter'] = $this->postsModel->getNameOfCriterion($genre,$id);
			
			$data['view'] ='filter_books.php';
			return $data;
		}
	}
}