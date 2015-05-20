<?php
namespace Controllers;
class Search extends Base
{
	private $postsModel = null;
	public function __construct(\Models\Search $searchModel)
	{
		$this->postsModel = $searchModel;
	}
	public function view(){
		$data=[];
		$data['view']='view_search.php';
		$recherche = $_REQUEST['searchAll'];
		$data['recherche'] = $_REQUEST['searchAll'];
		$data['resultat'] = $this->postsModel->recherche($recherche);
		return $data;
	}
}
