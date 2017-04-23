<?php
class Project implements JsonSerializable {
	private $id;
	private $name;
	private $description;
	private $prefix;
	private $adminId;
	private $client;
	private $startDate;
	private $endDate;
	private $status;
	
	function __construct($name, $prefix, $adminId, $id = null, $description = null, $client=null, $startDate = null, $endDate = null, $status = null) {
		if (empty($name)) {
			throw new Exception ( 'Empty project' );
		}
		
		
		$this->name = $name;
		$this->prefix = $prefix;
		$this->adminId = $adminId;
		$this->id = $id;
		$this->description= $description;
		$this->client= $client;
		$this->startDate = $startDate;
		$this->endDate = $endDate;
		$this->status = $status;
	}
	
	
	public function jsonSerialize() {
		$result = get_object_vars($this);
		return $result;
	}
	
	public function __get($prop) {
		return $this->$prop;
	}
	
	public function __set($name, $value){
		$this->$name = $value;
	}
	
	
}

?>