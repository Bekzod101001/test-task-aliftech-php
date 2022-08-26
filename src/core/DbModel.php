<?php

namespace app\core;

use app\exceptions\RecordNotFoundException;

class DbModel extends Model
{
    public static string $tableName;
    public array $attributes;


    public function save()
    {
        $attributesAsString = implode(',', $this->attributes);
        $paramsAsString = implode(',', array_map(fn($param) => ":$param", $this->attributes));
        $tableName = static::$tableName;
        $statement = Application::$app->database->prepare("INSERT INTO $tableName (" . $attributesAsString . ") VALUES(" . $paramsAsString . ")");

        foreach($this->attributes as $attribute){
            $statement->bindValue(":$attribute", $this->$attribute);
        }

        $statement->execute();
        return $statement->fetch();
    }

    public static function all()
    {
        $tableName = static::$tableName;
        $statement = Application::$app->database->prepare("SELECT * FROM $tableName");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function create($payload)
    {
        $columns = array_keys($payload);
        $columnsAsString = implode(',', $columns);
        $paramsAsString = implode(',', array_map(fn($param) => ":$param", $columns));
        $tableName = static::$tableName;
        $statement = Application::$app->database->prepare("INSERT INTO $tableName (" . $columnsAsString . ") VALUES(" . $paramsAsString . ")");

        foreach($payload as $key => $value){
            $statement->bindValue(":$key", $value);
        }

        $statement->execute();
    }

    public static function find(array $where)
    {
        $attributes = array_keys($where);
        $attributesForSql = implode(' AND ', array_map(fn($attr) => "$attr = :$attr", $attributes));
        $tableName = static::$tableName;
        $statement = Application::$app->database->prepare("SELECT * FROM $tableName WHERE $attributesForSql");

        foreach($where as $attribute => $item){
            $statement->bindValue(":$attribute", $item);
        }

        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public static function exists(array $where)
    {
        return (bool)self::find($where);
    }


    /**
     * @throws RecordNotFoundException
     */
    public static function findOrFail(array $where)
    {
        $item = self::find($where);

        if(!$item) {
            throw new RecordNotFoundException();
        }

        return $item;
    }
}