<?php
namespace Controllers;
class Users extends Base
{
	private $postsModel = null;
	public function __construct(){
		$this->postsModel = new \Models\Posts();
	}
	public function collect(){
		$data=[];
		$data['view']='default.php';
		return $data;
	}
	public function check(){
		$data=[];
		$data['view']='default.php';
		$data['data'] = $this->postsModel->getPosts();
		$data['categories'] = $this->postsModel->getCategories();
		if (empty($_REQUEST['email']) ||empty($_REQUEST['password'])) {
			die('il manque des donnees de connexion');
		}

		else{
			$login=$_REQUEST['email'];
			$mdp=$_REQUEST['password'];
			isset($_REQUEST['stay'])?$stay=$_REQUEST['stay']:$stay='';
			if($this->postsModel->verifyUser($login,$mdp) == false){
				$data['erreur']='erreur.php';
				$data['erreurMessage']='Désolé, mais il semblerait que vos identifiants soient incorrectes';
				$data['connected'] ='formNotConnected.php';
				return $data;
			}
			else{
				$test['admin']!=null?$test['admin']=1:$test['admin']=0;
				$test['admin']!=null?$data['admin']='admin.php':$data['admin']='common.php';
				$this->connect($login,$password,$stay,$admin);
			}
		}
	}
	public function create(){
		$login=$_REQUEST['email'];
		$mdp=$_REQUEST['password'];
		$mdpConfirm=$_REQUEST['passwordConfirm'];
		$data=[];
		$data['view']='default.php';
		$data['data'] = $this->postsModel->getPosts();
		$data['categories'] = $this->postsModel->getCategories();
		isset($_REQUEST['stay'])?$stay=$_REQUEST['stay']:$stay='';
		if ($mdp != $mdpConfirm) {
			$data['erreur']='erreur.php';
			$data['erreurMessage']='Désolé mais les mots de passes semblent ne pas correspondre';
			$data['connected'] ='formNotConnected.php';
			return $data;
		}
		if(empty($_REQUEST['email']) || empty($_REQUEST['password']) ||empty($_REQUEST['passwordConfirm'])){
			$data['erreur']='erreur.php';
			$data['erreurMessage']='Désolé mais tout les champs doivent être complétés';
			$data['connected'] ='formNotConnected.php';
			return $data;
		}
		if ($this->postsModel->verifyUser($login,$mdp) == true) {
			$data['erreur']='erreur.php';
			$data['erreurMessage']='Désolé mais il semblerait que cet utilisateur existe déjà';
			$data['connected'] ='formNotConnected.php';
			return $data;
		}
		else{
			$this->postsModel->createUser($login,$mdp);
			$this->connect($login,$mdp,$stay);
		}
	}
	public function disconnect(){
		if (isset($_COOKIE['connected'])) {
			setcookie("connected",'',-1);
		}
		setcookie("name",'',-1);
		session_destroy();
		header('Location: index.php');

	}
	private function connect($email,$mdp,$stay,$admin){
		$_SESSION['user'] = $email;
		$_SESSION['connected']=1;
		$admin==true?$_SESSION['admin']=1:$_SESSION['admin']=0;
		if ($stay == 'on') {
			setcookie("connected", 'blog', time()+36000);
		}
		setcookie("name", $email, time()+36000);
		header('Location: '.$_SERVER['QUERY_STRING']);
	}
}