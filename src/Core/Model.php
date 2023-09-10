<?php

namespace Blog\Core;

use Blog\Core\Database\DatabaseConnection;
use PDO;

abstract class Model
{
    protected PDO $conn;
    protected string $table;

    public function __construct()
    {
        $this->conn = DatabaseConnection::getInstance()->getConnection();
        $this->setTableName();
    }

    public function __sleep()
    {
        return array_diff(array_keys(get_object_vars($this)), ['conn']);
    }

    public function __wakeup()
    {
        $this->conn = DatabaseConnection::getInstance()->getConnection();
    }

    protected function setTableName(): void
    {
        $this->table = $this->table ?: $this->getDefaultTableName();
    }

    protected function getDefaultTableName(): string
    {
        return strtolower(str_replace('Blog\Models\\', '', get_class($this))) . 's';
    }

    public function fromArray(array $data)
    {
        foreach ($data as $property => $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
        return $this;
    }

    public function create($data): bool
    {
        $fields = implode(',', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO $this->table ($fields) VALUES ($values)";
        $stmt = $this->conn->prepare($sql);

        $this->bindValues($stmt, $data);

        return $stmt->execute();
    }

    public function find($id): ?Model
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $this->fromArray($result) : null;
    }

    public function update($data): bool
    {
        $fields = $this->getFields($data);

        $sql = "UPDATE $this->table SET $fields WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $data['id'] = $this->id;

        $this->bindValues($stmt, $data);

        return $stmt->execute();
    }

    protected function getFields($data): string
    {
        $fields = '';

        foreach ($data as $key => $value) {
            $fields .= "$key = :$key, ";
        }

        return rtrim($fields, ', ');
    }

    protected function bindValues($stmt, $data): void
    {
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
    }

    public function delete(): bool
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $this->id]);
    }

    public function where($column, $value)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE $column = :value");
        $stmt->execute([':value' => $value]);

        return $stmt->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }

    public function first($column, $value)
    {
        $results = $this->where($column, $value);
        return $results ? $results[0] : null;
    }

    // Relations
    public function hasMany($related, $foreignKey = null): array
    {
        $foreignKey = $foreignKey ?? $this->getForeignKey();
        $query = "SELECT * FROM " . (new $related)->table . " WHERE $foreignKey = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $this->id]);

        return $this->getRelatedInstances($stmt, $related);
    }

    protected function getForeignKey(): string
    {
        return strtolower((new \ReflectionClass($this))->getShortName()) . '_id';
    }

    protected function getRelatedInstances($stmt, $related): array
    {
        $relatedInstances = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $relatedInstances[] = (new $related)->fromArray($row);
        }

        return $relatedInstances;
    }

    public function belongsTo($related, $foreignKey = null): array|null
    {
        $foreignKey = $foreignKey ?? $this->getForeignKey();
        $query = "SELECT * FROM " . (new $related)->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $this->$foreignKey]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? (new $related)->fromArray($result) : null;
    }
}
