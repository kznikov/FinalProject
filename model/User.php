<?php
class User implements JsonSerializable {
	private $id;
	private $username;
	private $password;
	private $firstname;
	private $lastname;
	private $email;
	
	function __construct($username, $password, $id = null, $firstname = null, $lastname = null, $email = null) {
		if (empty($username)) {
			throw new Exception ( 'Empty username' );
		}
		
		if (strlen($password) === 0){
			throw new Exception('Empty passowrd' );
		}
		
		$this->username = $username;
		$this->password = $password;
		$this->id = $id;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->email = $email;
	}
	
	
	public function jsonSerialize() {
		$result = get_object_vars($this);
		unset($result['password']);
		return $result;
	}
	
	public function __get($prop) {
		return $this->$prop;
	}
}

?>