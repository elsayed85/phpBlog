<?php

namespace Blog\Models;


use Blog\Database\DatabaseConnection;
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
        $default = $this->table;

        if (!$default) {
            $default = strtolower(str_replace('Blog\Models\\', '', get_class($this))).'s';
        }

        $this->table = $default;
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
        $values = ':'.implode(', :', array_keys($data));

        $sql = "INSERT INTO $this->table ($fields) VALUES ($values)";
        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

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

    public function update($id, $data): bool
    {
        $fields = '';

        foreach ($data as $key => $value) {
            $fields .= "$key = :$key, ";
        }

        $fields = rtrim($fields, ', ');

        $sql = "UPDATE $this->table SET $fields WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $data['id'] = $id;

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }


    public function delete($id): bool
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function where($column, $value)
    {
        $stmt = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE $column = :value");
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
        $foreignKey = $foreignKey ?? strtolower((new \ReflectionClass($this))->getShortName()).'_id';
        $query = "SELECT * FROM ".(new $related)->table." WHERE $foreignKey = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $this->id]);

        $relatedInstances = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $relatedInstances[] = (new $related)->fromArray($row);
        }

        return $relatedInstances;
    }

    public function belongsTo($related, $foreignKey = null): array|null
    {
        $foreignKey = $foreignKey ?? strtolower((new \ReflectionClass($this))->getShortName()).'_id';
        $query = "SELECT * FROM ".(new $related)->table." WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $this->$foreignKey]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? (new $related)->fromArray($result) : null;
    }
}
