<?php
namespace Project\Data;

use Project\Data\DataInterface\DataInterface;
use Project\Data\Traits\ReusableModelFnx;
use Project\Util\DBFacade;

class User implements DataInterface {
    use ReusableModelFnx;
    
    public $id;
    public $fname;
    public $lname;
    public $email;

    public static function fromArray(array $data): self
    {
        $instance = new self();
        $instance->id = $data['id'] ?? null;
        $instance->fname = $data['fname'] ?? null;
        $instance->lname = $data['lname'] ?? null;
        $instance->email = $data['email'] ?? null;

        return $instance;
    }

    public function getTableName(): string
    {
        return "user";
    }
}