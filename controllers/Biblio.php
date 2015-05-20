<?php
namespace Controllers;
class Biblio extends Base
{
	private $postsModel = null;
	public function __construct(\Models\Biblio $biblioModel)
	{
		$this->postsModel = $biblioModel;
	}
	public function view() {
		//Je récupère toutes les bibliothèques
		$data['view']='view_biblio.php';
		$data['biblios']=$this->postsModel->getBiblios();
		return $data;
	}
}