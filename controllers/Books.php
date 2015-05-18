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
		if(isset($_SESSION['connected']) || isset($_COOKIE['connected'])){
			$data['connected'] = 'formConnected.php';
		}
		else{
			$data['connected'] = 'formNotConnected.php';
		}
		return $data;
	}
	public function view(){
		$data=[];
		$data['view'] ='view_books.php';
		$data['biblio']=$this->postsModel->getAllBiblio();
		$data['id']=0;
		$data['data']['books'] = $this->postsModel->getBooks();
		for ($i=0; $i<count($data['data']); $i++) {
		$data['data']['auteur'][$i]=$this->postsModel->getAuteur($data['data']['books'][$i]['auteur_id']);
		$data['data']['maison'][$i]=$this->postsModel->getMaison($data['data']['books'][$i]['maison_id']);
		$data['data']['type'][$i]=$this->postsModel->getType($data['data']['books'][$i]['type_id']);
		$data['data']['genre'][$i]=$this->postsModel->getGenre($data['data']['books'][$i]['genre_id']);
		$data['data']['biblio'][$i]=$this->postsModel->getBiblio($data['data']['books'][$i]['biblio_id']);
		}
		/*$i=0;
		foreach ($data['data'] as $book) {
			$book['auteur'][$i]=$this->postsModel->getAuteur($book['auteur_id']);
			$book['maison'][$i]=$this->postsModel->getMaison($book[$i]['maison_id']);
			$book['type'][$i]=$this->postsModel->getType($book[$i]['type_id']);
			$book['genre'][$i]=$this->postsModel->getGenre($book[$i]['genre_id']);
			$book['biblio'][$i]=$this->postsModel->getBiblio($book[$i]['biblio_id']);
			$i++;
		}*/

		if(isset($_SESSION['connected']) || isset($_COOKIE['connected'])){
		$data['connected'] = 'formConnected.php';
		}
		else{
			$data['connected'] = 'formNotConnected.php';
		}
		return $data;
	}
	public function update(){

		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$id=$_GET['id'];
			$data=[];
			$data['data'] = $this->postsModel->getPost($id);
			$data['categories'] = $this->postsModel->getCategories();
			$data['view'] ='update_posts.php';
			if(isset($_SESSION['connected']) || isset($_COOKIE['connected'])){
			$data['connected'] = 'formConnected.php';
			}
			else{
			$data['connected'] = 'formNotConnected.php';
			}
			return $data;
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$errors= [];
			if (empty($_POST['signature'])) {
				$errors['signature'] = true;
			}
			if (empty($_POST['body'])) {
				$errors['body'] = true;
			}
			if($_POST['newCategory'] != ''){
				$this->postsModel->createCategory($_POST['newCategory']);
				$this->postsModel->modifyMessage($_POST['signature'],$_POST['body'],$_POST['id'], $_POST['newCategory']);
				header('Location: http://localhost/Cours4/index.php');
			}
			elseif(count($errors) === 0){	
				$this->postsModel->modifyMessage($_POST['signature'],$_POST['body'],$_POST['id'], $_POST['category']);
				header('Location: http://localhost/Cours4/index.php');
			}
		}

	}
	public function create(){
		
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$data=[];
			$data['categories'] = $this->postsModel->getCategories();
			$data['view'] ='create_posts.php';
			if(isset($_SESSION['connected']) || isset($_COOKIE['connected'])){
					$data['connected'] = 'formConnected.php';
			}
			else{
				$data['connected'] = 'formNotConnected.php';
			}
			return $data;
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$errors= [];
			if (empty($_POST['signature'])) {
				$errors['signature'] = true;
			}
			if (empty($_POST['body'])) {
				$errors['body'] = true;
			}
			if($_POST['newCategory'] != ''){
				$this->postsModel->createCategory($_POST['newCategory']);
				$this->postsModel->createMessage($_POST['signature'],$_POST['body'], $_POST['newCategory']);
				header('Location: http://localhost/Cours3/index.php');
			}
			elseif(count($errors) === 0){	
				$this->postsModel->createMessage($_POST['signature'],$_POST['body'], $_POST['category']);
				header('Location: http://localhost/Cours3/index.php');
			}
		}
	}
	public function delete(){
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$id=$_GET['id'];
			$data=[];
			$data['data'] = $this->postsModel->getPost($id);
			$data['categories'] = $this->postsModel->getCategories();
			$data['view'] ='delete_posts.php';
			if(isset($_SESSION['connected']) || isset($_COOKIE['connected'])){
					$data['connected'] = 'formConnected.php';
			}
			else{
				$data['connected'] = 'formNotConnected.php';
			}
			return $data;
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$id=$_POST['id'];
			$this->postsModel->deleteMessage($id);
			header('Location: http://localhost/Cours3/index.php');
		}
	}
	public function filter(){
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$data=[];
			$genre=$_GET['kind'];
			$id=$_GET['id'];
			$data['livres'] = $this->postsModel->getBooksByCriterion($genre,$id);
			$data['filter'] = $this->postsModel->getNameOfCriterion($genre,$id);
			$data['view'] ='filter_books.php';
			return $data;
		}
	}
}