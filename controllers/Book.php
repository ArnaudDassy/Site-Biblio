<?php
namespace Controllers;
class Book extends Base
{
	private $postsModel = null;
	public function __construct(\Models\Book $bookModel)
	{
		$this->postsModel = $bookModel;
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
	public function add(){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$errors= [];
			/* TEST SI UN CHAMP EST VIDE */
			if (empty($_POST['title'])) {
				$errors['signature'] = true;
			}
			if (empty($_POST['body'])) {
				$errors['body'] = true;
			}
			if (empty($_POST['auteur'])) {
				$errors['auteur'] = true;
			}
			if (empty($_POST['genre'])) {
				$errors['genre'] = true;
			}
			if (empty($_POST['maison'])) {
				$errors['maison'] = true;
			}
			if (empty($_POST['note'])) {
				$errors['note'] = true;
			}
			if (empty($_POST['type'])) {
				$errors['type'] = true;
			}
			if(count($errors) === 0){
				$this->postsModel->testExist($_POST['auteur'],'auteur');
				$this->postsModel->testExist($_POST['genre'],'genre');
				$this->postsModel->testExist($_POST['maison'],'maison');
				$this->postsModel->testExist($_POST['type'],'type');
				$this->postsModel->testExist($_POST['biblio'],'biblio');
				$this->postsModel->
				createLivre(
					$this->postsModel->convert($_POST['auteur'],'auteur'),
					$this->postsModel->convert($_POST['genre'],'genre'),
					$this->postsModel->convert($_POST['maison'],'maison'),
					$this->postsModel->convert($_POST['type'],'type'),
					$this->postsModel->convert($_POST['biblio'],'biblio'),
					$_POST['body'],
					$_POST['title'],
					$_POST['note']
				);
				$data['view'] ='view_books.php';
				$dernierLivre=$this->postsModel->lastBookID();
				header('Location: http://localhost/Site Biblio/index.php?a=view&e=book&id='.$dernierLivre['max(id)']);
			}
			else{
				die('un CHAMP est vide');
			}
		}
	}
	public function view(){
			$data=[];
			$data['view']='view_book.php';
			$data['data']=$this->postsModel->getBook($_REQUEST['id']);
			$data['data']['auteur']=$this->postsModel->getAuteur($data['data'][0]['auteur_id']);
			$data['data']['maison']=$this->postsModel->getMaison($data['data'][0]['maison_id']);
			$data['data']['type']=$this->postsModel->getType($data['data'][0]['type_id']);
			$data['data']['genre']=$this->postsModel->getGenre($data['data'][0]['genre_id']);
			$data['data']['biblio']=$this->postsModel->getBiblio($data['data'][0]['biblio_id']);
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
			$data=[];
			$data['view']='update_book.php';
			$data['data']=$this->postsModel->getBook($_GET['id']);
			$data['data']['auteur']=$this->postsModel->getAuteur($data['data'][0]['auteur_id']);
			$data['data']['maison']=$this->postsModel->getMaison($data['data'][0]['maison_id']);
			$data['data']['type']=$this->postsModel->getType($data['data'][0]['type_id']);
			$data['data']['genre']=$this->postsModel->getGenre($data['data'][0]['genre_id']);
			$data['data']['biblio']=$this->postsModel->getBiblio($data['data'][0]['biblio_id']);
			$data['biblio']=$this->postsModel->getAllBiblio();
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
			/* TEST SI UN CHAMP EST VIDE */
			if (empty($_POST['title'])) {
				$errors['signature'] = true;
							}
			if (empty($_POST['body'])) {
				$errors['body'] = true;
						}
			if (empty($_POST['auteur'])) {
				$errors['auteur'] = true;
				
			}
			if (empty($_POST['genre'])) {
				$errors['genre'] = true;
							}
			if (empty($_POST['maison'])) {
				$errors['maison'] = true;
				
			}
			if (empty($_POST['note'])) {
				$errors['note'] = true;
						}
			if (empty($_POST['type'])) {
				$errors['type'] = true;
						}
			if(count($errors) === 0){
				$this->postsModel->testExist($_POST['auteur'],'auteur');
				$this->postsModel->testExist($_POST['genre'],'genre');
				$this->postsModel->testExist($_POST['maison'],'maison');
				$this->postsModel->testExist($_POST['type'],'type');
				$this->postsModel->testExist($_POST['biblio'],'biblio');
				$this->postsModel->
				updateLivre(
					$this->postsModel->convert($_POST['auteur'],'auteur'),
					$this->postsModel->convert($_POST['genre'],'genre'),
					$this->postsModel->convert($_POST['maison'],'maison'),
					$this->postsModel->convert($_POST['type'],'type'),
					$this->postsModel->convert($_POST['biblio'],'biblio'),
					$_POST['body'],
					$_POST['title'],
					$_POST['note'],
					$_POST['id']
				);
				header('Location: http://localhost/Biblio/index.php?a=view&e=book&id='.$_POST['id']);
			}
			else{
				die('erreur');
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
}