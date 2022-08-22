<?php

namespace App\Models;

use Analog\Analog;
use App\Exception\Handler;
use App\Helpers\Database\ModelQueryBuilder;

class AbstractModel
{

    protected array $definedProperties = [];

    protected bool $exist = false;

    public array $propertiesWhiteList = [];

    public array $propertiesBlackList = [];

    public string $table = '';


    public function __set(string $name, $value): void
    {
        if (!empty($this->propertiesWhiteList) && !in_array($name, $this->propertiesWhiteList)) {
            Handler::showDefaultError("Trying to set forbidden property '$name'");
        }

        if (in_array($name, $this->propertiesBlackList)) {
            Handler::showDefaultError("Trying to set forbidden property '$name'");
        }

        $this->definedProperties[$name] = $value;
    }

    public function __get($name)
    {
        if (!array_key_exists($name, $this->definedProperties)) {
            Handler::showDefaultError("Trying to get undefined property '$name'");
        }
        return $this->definedProperties[$name];
    }

    public function setExist($value = true)
    {
        $this->exist = $value;
    }

    public function fill($params)
    {
        foreach ($params as $param => $value) {
            $this->{$param} = $value;
        }
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        if (empty($this->table)) {
            Handler::showDefaultError("Undefined table name");
        }
        return $this->table;
    }

    /**
     * @return ModelQueryBuilder
     */
    public static function query()
    {
        $builder = new ModelQueryBuilder(static::class);
        return $builder;
    }

    /**
     * @return bool|\mysqli_result|void
     */
    public function save()
    {
        $builder = self::query();

        if ($this->exist) {
            return $builder->update($this->table, $this->definedProperties);
        } else {
            return $builder->insert($this->table, $this->definedProperties);
        }
    }

    /**
     * @param $params
     * @return void
     */
    public function fillAndSave($params)
    {
        $this->fill($params);
        $this->save();
    }

}