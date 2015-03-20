<?php 
namespace Models;
interface UserRepositoryInterface
{
	public function getUser($email,$password);
	public function createUser($email,$password);
}