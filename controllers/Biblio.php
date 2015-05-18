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
		$data['view']='view_biblio.php';
		$data['biblios']=$this->postsModel->getBiblios();
		return $data;
	}
}