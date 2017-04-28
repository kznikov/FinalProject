<?php

class Task implements JsonSerializable {

    private $id;
    private $title;
    private $description;
    private $createdBy;
    private $ownerId;
    private $progress;
    private $type;
    private $status;
    private $projectId;
    private $priority;
    private $startDate;
    private $endDate;
    private $projectName;
    private $prefixId;
    private $ownerUsername;

    function __construct($title, $projectId, $createdBy, $ownerId, $type, $priority, $status, $progress,
    		$description = null, $startDate = null, $endDate = null, $id = null, $projectName = null, $prefixId = null, $ownerUsername = null) {
        if (empty($title)) {
            throw new Exception('Empty task!');
        }

        $this->title = $title;
        $this->projectId = $projectId;
        $this->createdBy = $createdBy;
        $this->ownerId = $ownerId;
        $this->type = $type;
        $this->priority = $priority;
        $this->status = $status;
        $this->description = $description;
        $this->progress = $progress;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->id = $id;
        $this->projectName = $projectName;
        $this->prefixId = $prefixId;
        $this->ownerUsername = $ownerUsername;
    }

    public function jsonSerialize() {
        $result = get_object_vars($this);
        return $result;
    }

    public function __get($prop) {
        return $this->$prop;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

}

?>