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
		if(count($_POST) < 4){
			$data=[];
			$data['view']='view_search.php';
			$recherche = $_REQUEST['searchAll'];
			$data['recherche'] = $_REQUEST['searchAll'];
			$data['resultat'] = $this->postsModel->recherche($recherche);
			return $data;
		}
		else{
			die('plus grand que 4');
		}
	}
}
