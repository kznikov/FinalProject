<?php

class Role implements JsonSerializable {

    private $name;
    private $permissions;

    function __construct($name, $permissions = array()) {
        $this->name = $name;
        $this->permissions = $permissions;
    }

    public function __get($prop) {
        return $this->$prop;
    }

    public function jsonSerialize() {
        $result = get_object_vars($this);
        return $result;
    }

}

?>