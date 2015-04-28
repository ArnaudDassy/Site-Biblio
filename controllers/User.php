<?php
namespace Controllers;
class User extends Base
{
	private $postsModel = null;
	public function __construct(\Models\User $userModel)
	{
		$this->postsModel = $userModel;
	}
	public function collect(){
		$data=[];
		$data['view']='default.php';
		return $data;
	}
	public function view(){
		$data=[];
		$data['view']='view_user.php';
		return $data;
	}
	public function check(){
		if (empty($_REQUEST['user']) ||empty($_REQUEST['mdp'])) {
			die('il manque des donnees de connexion');
		}

		else{
			$login=$_REQUEST['user'];
			$mdp=$_REQUEST['mdp'];
			isset($_REQUEST['stay'])?$stay=$_REQUEST['stay']:$stay='';
			$user= $this->postsModel->verifyUser($login,$mdp);
			if($user == false){
				$data['erreur']='erreur.php';
				$data['erreurMessage']='Désolé, mais il semblerait que vos identifiants soient incorrectes';
				$data['connected'] ='formNotConnected.php';
				$data['view']='view_user.php';

			}
			else{
				$user=$this->postsModel->getUser($login,$mdp);
				$user['admin']!=null?$user['admin']=1:$user['admin']=0;
				/*$test['admin']!=null?$data['admin']='admin.php':$data['admin']='common.php';*/
				$this->connect($user['user_name'],$stay,$user['admin']);
				$data['view']='default.php';
				return $data;
			}
		}
	}
	public function create(){
		$login=$_REQUEST['user'];
		$mdp=$_REQUEST['mdp'];
		$mdpConfirm=$_REQUEST['mdpConfirm'];
		$data['view']='default.php';
		isset($_REQUEST['stay'])?$stay=$_REQUEST['stay']:$stay='';
		if ($mdp != $mdpConfirm) {
			$data['erreur']='erreur.php';
			$data['erreurMessage']='Désolé mais les mots de passes semblent ne pas correspondre';
			return $data;
		}
		if(empty($_REQUEST['user']) || empty($_REQUEST['mdp']) ||empty($_REQUEST['mdpConfirm'])){
			$data['erreur']='erreur.php';
			$data['erreurMessage']='Désolé mais tout les champs doivent être complétés';
			return $data;
		}
		if ($this->postsModel->verifyUser($login,$mdp) == true) {
			$data['erreur']='erreur.php';
			$data['erreurMessage']='Désolé mais il semblerait que cet utilisateur existe déjà';
			return $data;
		}
		else{
			$this->postsModel->createUser($login,$mdp);
			$this->connect($login,$mdp,$stay);
		}
	}
	public function settings(){
		isset($_SESSION['user'])?$user=$_SESSION['user']:$user=null;
		$data['view']='settings_user.php';
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			$updatedData=$_POST;
			$this->postsModel->updateUser($user,$updatedData);
		}
		$data['user']=$this->postsModel->getUserByName($user);
		return $data;
		header('Location : http://localhost/Biblio/index.php?a=settings&e=user');
	}
	public function disconnect(){
		if (isset($_COOKIE['connected'])) {
			setcookie("connected",'',-1);
			setcookie("admin",'',-1);
		}
		setcookie("name",'',-1);
		session_destroy();
		header('Location: '.$_SERVER['QUERY_STRING']);
	}
	private function connect($email,$stay,$admin){
		$_SESSION['user'] = $email;
		$_SESSION['connected']=1;
		$admin==1?$_SESSION['admin']=1:$_SESSION['admin']=0;
		if ($stay == 'on') {
			setcookie("connected", 'biblio Liège', time()+36000);
			setcookie("name", $email, time()+36000);
			if($admin == true){
				setcookie("admin", 'admin bilbio Liège', time()+36000);
			}
		}
		/*header('Location: '.$_SERVER['QUERY_STRING']);*/
		header('Location: http://localhost/Biblio/index.php');
	}
}
