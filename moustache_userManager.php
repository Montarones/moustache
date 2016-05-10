<?php

class moustache_userManager
{
	protected $db;
	
// CONSTRUCT

	public function __construct($db)
	{
		$this->setDb($db);
	}
// GETTERS
	
	public function db()
	{
		return $this->db;
	}
// SETTERS 
	
	public function setDb($db)
	{
		$this->db = $db;
	}
// ADD

	public function add(moustache_user $user)
	{
		$q=$this->db->prepare('INSERT INTO moustache_user(pseudo, password, mail) VALUES(:pseudo, :password, :mail)');
		$q->execute([':pseudo' => $user->pseudo(),
		':password' => $user->password(),
		':mail' => $user->mail()]);
	}
// DELETE

	public function delete($user)
	{
		if ($user = is_int($user))
		{
			$this->db->query('DELETE * FROM moutache_user WHERE id=' .$user);
		}
		if ($user = is_string($user))
		{
			$q=$this->prepare("DELETE * FROM moustache_user WHERE pseudo='" .$user. "'");
		}
	}

// EXISTE
	public function exists($user)
	{
		if(is_string($user))
		{
			return (bool) $this->db->query("SELECT COUNT(*) FROM moustache_user WHERE pseudo ='".$user."'")->fetchColumn();
			
		}
		if(is_int($user))
		{
			
			return (bool) $this->db->query('SELECT COUNT(*) FROM moustache_user WHERE id = '.$user)->fetchColumn();
			
		}
		
	}
// INFORMATIONS
	public function info($user)
	{
		if(is_string($user))
		{
			$q=$this->db->prepare('SELECT * FROM moustache_user WHERE pseudo = :pseudo');
			$q->execute([':pseudo' => $user]);
			while ($info = $q->fetch())
			{
				$perso = new moustache_user($info);
				echo 'Pseudo: '. $perso->pseudo() . 'Password: ' . $perso->password() . 'Id: ' . $perso->id();
			}
		}
		if(is_int($user))
		{
			$q=$this->db->prepare('SELECT * FROM moustache_user WHERE id= :id');
			$q->execute([':id' => $user]);
			while ($info = $q->fetch())
			{
				$perso = new moustache_user($info);
				echo 'Pseudo: '. $perso->pseudo() . 'Password: ' . $perso->password() . 'Id: ' . $perso->id();
			}
		}
	}
// UTILISER USER
		public function utiliser($pseudo, $password)
		{
			$sql = 'SELECT COUNT(*) FROM moustache_user WHERE pseudo= :pseudo AND password = :password';
			$q=$this->db->prepare($sql);
			$q->execute([':pseudo' => $pseudo,
			':password' => $password]);
			
			
			if($q->fetchColumn()>0)
			{
				$sql = 'SELECT * FROM moustache_user WHERE pseudo= :pseudo AND password = :password';
				$q=$this->db->prepare($sql);
				$q->execute([':pseudo' => $pseudo,
				':password' => $password]);
				while($info=$q->fetch())
				{
					$perso = new moustache_user($info);
					echo 'id :' . $perso->id() . 'pseudo :'.$perso->pseudo(). 'password :' . $perso->password();
					return $perso;
				}
				
			}
			else
			{
				echo 'Erreur : Personnage ou password incorrect';
			}
			
		}
// CONNEXION
	public function connexion($user, $password)
	{
		return (bool) $this->db->query("SELECT COUNT(*) FROM moustache_user WHERE pseudo= '" .$user. "' AND password ='" .$password."'")->fetchColumn();
	}
// AMITIE
	public function ajoutAmi(moustache_user $user, moustache_user $userfriend)
	{
		$q=$this->db->prepare('INSERT INTO user_amis(user, user_friend) VALUES (:user, :user_friend)');
		$q->execute([':user' => $user->id(), 
					':user_friend' => $userfriend->id()]);
	}
	public function estAmi($user, $userfriend)
	{
		return (bool) $this->db->query("SELECT COUNT(*) FROM user_amis WHERE user = '" .$user. "' AND user_friend ='" .$userfriend. "'")->fetchColumn();  
	}
// ADMIN
	public function admin(moustache_user $user, $acces)
	{
		$q=$this->db->prepare('UPDATE moustache_user SET admin = :admin WHERE id = :id');
		$q->execute([':admin' => $acces,
		':id' => $user->id()]);
	}
	public function estAdmin($user)
	{
		if (is_int($user))
		{
			return (bool) $this->db->query("SELECT admin FROM moustache_user WHERE id = '".$user."' AND admin=true ")->fetchColumn();
			
		
		}
		return (bool) $this->db->query("SELECT * FROM moustache_user WHERE pseudo ='".$user."' AND admin=true ")->fetchColumn();
		
		
	}
}

