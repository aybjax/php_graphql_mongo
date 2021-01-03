<?php
namespace Project\Data\Traits;

use Project\Util\DBFacade;

trait ReusableModelFnx {
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

    public static function getQuery(string $query, array $args = []): array
    {
        return DBFacade::getQuery(new self(), $query, $args);
    }

    public static function all(): array
    {
        return DBFacade::getQuery(new self());
    }

    public function save(): void
    {
        $this->id = DBFacade::insert($this);
    }

    public function delete(): void
    {
        DBFacade::delete($this);
    }
}