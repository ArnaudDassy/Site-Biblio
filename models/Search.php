<?php
namespace Models;
class Search extends Model implements SearchRepositoryInterface
{
	public function recherche($keyword){
		$result=[];
		$j[0]='auteur';
		$j[1]='genre';
		$j[2]='maison';
		$j[3]='livre';
		for ($i=0; $i < 4 ; $i++) {
			if($i < 3){
			$sql= "SELECT * FROM ".$j[$i]." WHERE nom LIKE '%".$keyword."%'";
			$res= $this->connexion->query($sql);
			$res_fetch=$res->fetchAll();
			}
			if($i == 3){
			$sql= "SELECT * FROM ".$j[$i]." WHERE titre LIKE '%".$keyword."%'";
			$res= $this->connexion->query($sql);
			$res_fetch=$res->fetchAll();
			}
			$result[$j[$i]]['categorySearch']=$j[$i];
			if(empty($res_fetch)){
				$result[$j[$i]]['result']=null;
				$result[$j[$i]]['target']=0;
			}
			else{
				$result[$j[$i]]['result']=$res_fetch;
				$result[$j[$i]]['target']=1;
			}
		}
		return $result;
	}
}
