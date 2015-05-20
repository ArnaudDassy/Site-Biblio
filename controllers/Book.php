<?php
namespace Controllers;
class Book extends Base
{
	private $postsModel = null;
	public function __construct(\Models\Book $bookModel)
	{
		$this->postsModel = $bookModel;
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
				//Dans un premier temps, je test d'abord pour voir si les données fournies n'existe déjà pas dans la BDD
				$this->postsModel->testExist($_POST['auteur'],'auteur');
				$this->postsModel->testExist($_POST['genre'],'genre');
				$this->postsModel->testExist($_POST['maison'],'maison');
				$this->postsModel->testExist($_POST['type'],'type');
				$this->postsModel->testExist($_POST['biblio'],'biblio');

				//Je crée le livre en récupérant l'id correspondant pour "chaque type de donnée"
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

				//Je récupère l'id du livre qui vient d'être créé
				$dernierLivre=$this->postsModel->lastBookID();
				
				//Je mets à jour le chemin vers son image
				$this->postsModel->updatePath($dernierLivre['max(id)']);

				//Je renomme l'image
				$data["id"]=$dernierLivre['max(id)'];
				rename("./files/image_0.png","./files/image_".$data["id"].".png");

				//Redirection
				header('Location: http://localhost/Biblio/index.php?a=view&e=book&id='.$dernierLivre['max(id)']);
			}
			else{
				die('un CHAMP est vide');
			}
		}
	}
	public function view(){

			//Je récupère toute les informations relatives au livre
			$data=[];
			$data['view']='view_book.php';
			$data['data']=$this->postsModel->getBook($_REQUEST['id']);

			//Je convertis les id en noms
			$data['data']['auteur']=$this->postsModel->getAuteur($data['data'][0]['auteur_id']);
			$data['data']['maison']=$this->postsModel->getMaison($data['data'][0]['maison_id']);
			$data['data']['type']=$this->postsModel->getType($data['data'][0]['type_id']);
			$data['data']['genre']=$this->postsModel->getGenre($data['data'][0]['genre_id']);
			$data['data']['biblio']=$this->postsModel->getBiblio($data['data'][0]['biblio_id']);
			return $data;
	}
	public function update(){

		if ($_SERVER['REQUEST_METHOD'] === 'GET') {

			//Je récupère le livre pour l'afficher dans les champs correspondant
			$data=[];
			$data['view']='update_book.php';
			$data['data']=$this->postsModel->getBook($_GET['id']);
			$data['data']['auteur']=$this->postsModel->getAuteur($data['data'][0]['auteur_id']);
			$data['data']['maison']=$this->postsModel->getMaison($data['data'][0]['maison_id']);
			$data['data']['type']=$this->postsModel->getType($data['data'][0]['type_id']);
			$data['data']['genre']=$this->postsModel->getGenre($data['data'][0]['genre_id']);
			$data['data']['biblio']=$this->postsModel->getBiblio($data['data'][0]['biblio_id']);
			$data['biblio']=$this->postsModel->getAllBiblio();
			return $data;
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$errors= [];
			
			//Je test si il y a un champ vide
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

				//Idem que pour function add(){};
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
	public function delete(){
		
		//Je récupère le livre pour l'afficher
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$id=$_GET['id'];
			$data=[];
			$data=[];
			$data['view']='view_book.php';
			$data['data']=$this->postsModel->getBook($_REQUEST['id']);
			$data['data']['auteur']=$this->postsModel->getAuteur($data['data'][0]['auteur_id']);
			$data['data']['maison']=$this->postsModel->getMaison($data['data'][0]['maison_id']);
			$data['data']['type']=$this->postsModel->getType($data['data'][0]['type_id']);
			$data['data']['genre']=$this->postsModel->getGenre($data['data'][0]['genre_id']);
			$data['data']['biblio']=$this->postsModel->getBiblio($data['data'][0]['biblio_id']);
			$data['view'] ='delete_book.php';
			return $data;
		}

		//L'utilisateur à confirmer la suppression
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$id=$_POST['id'];
			$this->postsModel->deleteBook($id);
			header('Location: http://localhost/Biblio/index.php');
		}
	}
}