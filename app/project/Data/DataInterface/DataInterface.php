<?php
namespace Project\Data\DataInterface;

interface DataInterface {
    public function getTableName(): string;
    public function tableFields(): array;
    public function save(): void;
    public function getId(?int $id): void;
    public function getQuery(string $query, ?array $args): void;
}
