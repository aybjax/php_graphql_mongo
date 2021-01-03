<?php
namespace Project\Data;

use Project\Data\DataInterface\DataInterface;
use Project\Util\DBFacade;

class User implements DataInterface {
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

    public function tableFields(): array
    {
        return (array) $this;
    }

    public function getId(int $id = null): void
    {
        if(!$id)
        {
            $id = $this->id;
        }

        DBFacade::getId($this, $id);
    }

    public function getQuery(string $query, array $args = null): void
    {
        DBFacade::getQuery($this, $query, $args);
    }

    public function save(): void
    {
        $this->id = DBFacade::insert($this);
    }
}