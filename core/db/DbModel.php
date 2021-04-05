<?php

namespace app\core\db;

use PDO;
use app\core\Model;
use app\core\Application;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;
    abstract public function attributes(): array;
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
        foreach ($attributes as $key)
        {
            if (!isset($_POST[$key]) && $key === "is_admin")
            {
                $statement .= "`$key` = :$key,";
                $params[$key] = false;
            }
            if (isset($_POST[$key]) && $key != "id")
            {
                $statement .= "`$key` = :$key,";
                $params[$key] = $this->{$key};
            }
            if (isset($_POST[$key]) && $key == "id")
            {
                $statement .= "`$key` = :$key,";
                $params[$key] = $this->{$key};
            }
        }
        $statement = rtrim($statement, ",");
        self::prepare("UPDATE $tableName SET $statement WHERE id = :id")->execute($params);
        return true;
    }
    public function where($where) { // [email=>nisanurrunasin@gmail.com, firstName=> Nisanur]
        $tableName = $this->tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ",array_map(fn($attr)=>"$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach($where as $key=>$value){
            $statement->bindValue(":$key",$value);
        }
        $statement->execute();
        return $statement->fetchObject(static::class); // gives me instance
    }
    public function delete($value)
    {
        $tableName = $this->tableName();

        $query="DELETE FROM $tableName WHERE id=".($value);

        $statement = self::prepare($query);
        $statement->execute();
        return true;
    }
    public function selectFields($fields)
    {
        $sql = implode(", ",$fields);
        $tableName = $this->tableName();
        $statement = self::prepare("SELECT $sql FROM $tableName ORDER BY id DESC");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
    public function select()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $statement = self::prepare("SELECT * FROM $tableName ORDER BY id DESC");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
    public function countWhere($where)
    {
        $tableName = $this->tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ",array_map(fn($attr)=>"$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT COUNT(*) FROM $tableName WHERE $sql");
        foreach($where as $key=>$value){
            $statement->bindValue(":$key",$value);
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
    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}
