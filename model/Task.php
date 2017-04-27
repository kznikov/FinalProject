<?php

class Task implements JsonSerializable {

    private $id;
    private $title;
    private $description;
    private $createdBy;
    private $owner;
    private $progress;
    private $type;
    private $status;
    private $projectId;
    private $priority;
    private $startDate;
    private $endDate;

    function __construct($title, $projectId, $createdBy, $owner, $type, $priority, $status, $progress, $description = null, $startDate = null, $endDate = null, $id = null) {
        if (empty($title)) {
            throw new Exception('Empty task!');
        }

        $this->title = $title;
        $this->projectId = $projectId;
        $this->createdBy = $createdBy;
        $this->owner = $owner;
        $this->type = $type;
        $this->priority = $priority;
        $this->status = $status;
        $this->description = $description;
        $this->progress = $progress;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->id = $id;
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