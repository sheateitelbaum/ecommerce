<?php

class Item
{
    private $id, $name, $company_id, $category_id;

    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = id;
    }

}

?>