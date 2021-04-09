<?php

namespace app\core\db;

use PDO;
use app\core\Model;
use app\core\Application;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;
    abstract public function attributes(): array;
    abstract public function primaryKey(): string;
    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);

        $statement = self::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ")
        VALUES(" . implode(',', $params) . ")");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }
    public function update()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = [];
        $statement = "";
        foreach ($attributes as $key) {
            if ($key === "password") // PHP doesnt see checkbox's value
            {
               continue;
            }
            if (!isset($_POST[$key]) && $key === "is_admin") // PHP doesnt see checkbox's value
            {
                $statement .= "`$key` = :$key,";
                $params[$key] = false;
            }
            $statement .= "`$key` = :$key,";
            $params[$key] = $this->{$key};
        }
        $statement = rtrim($statement, ",");
        self::prepare("UPDATE $tableName SET $statement WHERE id = :id")->execute($params);
        return true;
    }
    public function updateWhere($fields, $where)
    {
        $tableName = $this->tableName();
        $attrFields = array_keys($fields);
        $sqlF = implode(", ", array_map(fn ($attr) => "$attr = :$attr", $attrFields));
        $attrWhere = array_keys($where);
        $sqlW = implode("AND", array_map(fn ($attr) => "$attr = :$attr", $attrWhere));
        $final="UPDATE $tableName SET $sqlF WHERE $sqlW";
        $statement = self::prepare($final);
        foreach ($fields as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        foreach ($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return true;
    }
    public function where($where)
    {
        $tableName = $this->tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn ($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return $statement->fetchObject(static::class); // gives me instance
    }
    public function isExist($where, $table)
    {
        $attributes = array_keys($where);
        $sql = implode(" OR ", array_map(fn ($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $table WHERE $sql LIMIT 1");
        foreach ($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        $result = $statement->fetchAll();
        $isExist = count($result) > 0 ? true : false;
        return $isExist; // gives me instance
    }
    public function delete($value)
    {
        $tableName = $this->tableName();

        $query = "DELETE FROM $tableName WHERE id=" . ($value);

        $statement = self::prepare($query);
        $statement->execute();
        return true;
    }
    public function selectFields($fields)
    {
        $sql = implode(", ", $fields);
        $tableName = $this->tableName();
        $statement = self::prepare("SELECT $sql FROM $tableName ORDER BY id DESC");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
    public function select()
    {
        $tableName = $this->tableName();
        $statement = self::prepare("SELECT * FROM $tableName ORDER BY id DESC");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
    public function countWhere($where)
    {
        $tableName = $this->tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn ($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT COUNT(*) AS 'count' FROM $tableName WHERE $sql");
        foreach ($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return $statement->fetchObject();
    }
    public static function executeRawQuery($sql)
    {
        $statement = self::prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public static function executeRawQueryWithParams($sql, $where)
    {
        $attributes = array_keys($where);
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $statement = self::prepare($sql);
        foreach ($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}
