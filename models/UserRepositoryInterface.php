<?php 
namespace Models;
interface UserRepositoryInterface
{
	public function getUser($email,$password);
	public function createUser($email,$password);
	public function verifyUser($login,$mdp);
	public function verifyIfUserExist($login);
	public function getUserByName($email);
}