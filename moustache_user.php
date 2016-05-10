<?php


class moustache_user
{
	protected $id;
	protected $pseudo;
	protected $password;
	protected $mail;
	protected $admin;
	
// CONSTRUCT

	public function __construct(array $info)
	{
		$this->hydrate($info);
	}
// HYDRATATION
	public function hydrate(array $info)
	{
		foreach($info as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			if(method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}
// GETTERS
	public function id()
	{
		return $this->id;
	}

	public function pseudo()
	{
		return $this->pseudo;
	}
	public function password()
	{
		return $this->password;
	}
	public function mail()
	{
		return $this->mail;
	}
	public function admin()
	{
		return $this->admin;
	}
// SETTERS
	public function setId($id)
	{
		$id = (int) $id;
		$this->id = $id;
	}
	public function setPseudo($pseudo)
	{
		if(is_string($pseudo))
		{
			$this->pseudo=$pseudo;
		}
	}
	public function setPassword($password)
	{
		$this->password=$password;
	}
	public function setMail($email)
	{
		$this->email=$email;
	}
	public function setAdmin($admin)
	{
		if (is_bool($admin))
		{
			$this->admin=$admin;
		}
		
	}

}