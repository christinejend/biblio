<?php 

namespace Model;

class User extends Model
{

	protected $table = 'users';


	public function check($credentials)//tableau avec emial et passwd
	{
		$sql = 'SELECT * FROM users WHERE email = :email AND password = :password';
		$pdoSt = $this->cn->prepare($sql);
		$pdoSt->execute(
			[':email' => $credentials['email'],
			':password' => $credentials['password']
			]
		);
		
		return $pdoSt->fetch(); // SI sql = utilisateur -> check retourne l'utili mais si il n'y en a pas il retournera false
	}




}