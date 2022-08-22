<?php

namespace App\Helpers\Database;

use App\Exception\Handler;
use App\Models\AbstractModel;

class ModelQueryBuilder extends QueryBuilder
{
    protected string $relatedModelName = '';

    public $relatedModel;

    public function __construct($relatedModelName)
    {
        $this->relatedModelName = $relatedModelName;
        $this->relatedModel = new $relatedModelName();
    }

    /**
     * @return array
     */
    private function getQueryResultByCurrentParams(): array
    {
        $query = "SELECT {$this->selectString} FROM `{$this->relatedModel->getTable()}`";
        if ($this->filterString) {
            $query .= " WHERE $this->filterString ";
        }

        $query .= "$this->orderString";

        $query .= "$this->limitString";
        $query .= "$this->offsetString";

        $queryResult = $this->selectFromDB($query, $this->paramList);

        return $queryResult;
    }

    /**
     * @param $string
     * @return array|string|string[]
     */
    private static function removeQuotes($string)
    {
        return str_replace(['"', '"', '`'], "", $string);
    }

    /**
     * @param $paramsAndValues
     * @return ModelQueryBuilder
     */
    public function where(array $paramsAndValues): ModelQueryBuilder
    {
        foreach ($paramsAndValues as $paramValueUnit) {
            switch (count($paramValueUnit)) {
                case 2:
                    $mark = '=';
                    $value = $paramValueUnit[1];
                    break;
                case 3:
                    $mark = $paramValueUnit[1];
                    $value =  $paramValueUnit[2];
                    break;
                default:
                    Handler::showDefaultError("Wrong amount of filter subarray");
                    continue 2;
            }
            if (!empty($this->filterString)) {
                $this->filterString .= " AND ";
            }

            $param = self::removeQuotes($paramValueUnit[0]);
            $this->paramList[] = $value;
            $this->filterString .= "`$param` $mark ?";
        }

        return $this;
    }

    /**
     * @param string $selectBy
     * @return ModelQueryBuilder|false
     */
    public function select(string $selectBy = '*'): ModelQueryBuilder
    {
        $this->selectString = self::removeQuotes($selectBy);
        return $this;
    }

    /**
     * @param $column
     * @param $desc
     * @return ModelQueryBuilder|false
     */
    public function orderBy($column, $desc = false): ModelQueryBuilder
    {
        if (is_bool($desc)) {
            if ($desc) {
                $desc = 'DESC';
            } else {
                $desc = 'ASC';
            }
        }

        if (!in_array($desc, ['ASC', 'asc', 'DESC', 'desc'])) {
            Handler::showDefaultError("Wrong ASC param value - $desc");
            return false;
        }

        $column = self::removeQuotes($column);

        $this->orderString = " ORDER BY $column $desc ";
        return $this;
    }

    /**
     * @param int $amount
     * @return ModelQueryBuilder
     */
    public function limit(int $amount): ModelQueryBuilder
    {
        $this->limitString = " LIMIT $amount ";
        return $this;
    }

    /**
     * @param int $amount
     * @return ModelQueryBuilder
     */
    public function offset(int $amount): ModelQueryBuilder
    {
        $this->offsetString = " OFFSET $amount ";
        return $this;
    }

    /**
     * @return array
     */
    public function get()
    {
        $queryResult = $this->getQueryResultByCurrentParams();
        $result = [];
        foreach ($queryResult as $resultElement) {
            $modelElement = new $this->relatedModelName();
            $modelElement->fill($resultElement);
            $modelElement->setExist(true);
            $result []= $modelElement;
        }

        return $result;
    }

    /**
     * @return array|mixed
     */
    public function first()
    {
        $getResult = $this->get();
        if ($getResult) {
            $getResult = $getResult[0];
        }
        return $getResult;
    }

    /**
     * @param $perPage
     * @param $page
     * @return array
     */
    public function paginate($perPage, $page)
    {
        $this->limit($perPage);
        $offset = $perPage * ($page - 1);
        $this->offset($offset);

        return $this->get();
    }

    public function countPages($perPage)
    {
        $select = 'COUNT(*)';

        $this->select($select);
        $amount = $this->getQueryResultByCurrentParams();

        if (empty($amount)) {

            return 0;
        }

        if (empty($amount[0][$select])) {
            return 1;
        }

        return ceil($amount[0][$select] / $perPage);
    }

    /**
     * @return bool
     */
    public function delete(): bool
    {
        $query = "DELETE FROM `{$this->relatedModel->getTable()}`";
        if ($this->filterString) {
            $query .= " WHERE $this->filterString ";
        }

        $queryResult = $this->doQuery($query, $this->paramList);

        return $queryResult;
    }

    /**
     * @param $params
     * @return bool
     */
    public function update($params)
    {
        $query = "UPDATE `{$this->relatedModel->getTable()}` SET ";

        $query .= $this->addInsertUpdateParams($params);

        if ($this->filterString) {
            $query .= " WHERE $this->filterString ";
        }

        $newParams = array_merge($this->updateParamList, $this->paramList);

        $queryResult = $this->doQuery($query, $newParams);

        return $queryResult;
    }
}
