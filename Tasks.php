<?php

class tasks
{
    private $id;
    private $title;
    private $description;
    private $important;


    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function isImportant()
    {
        return $this->important;
    }

    public function setImportant($important)
    {
        $this->important = $important;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
   
}

?>