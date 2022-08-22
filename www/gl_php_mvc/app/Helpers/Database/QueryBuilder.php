<?php

namespace App\Helpers\Database;

use App\Config\Config;
use App\Exception\Handler;
use mysqli;

class QueryBuilder
{

    protected array $paramList = [];
    protected array $updateParamList = [];

    protected string $selectString = '*';

    protected string $filterString = '';

    protected string $orderString = '';

    protected string $limitString = '';

    protected string $offsetString = '';

    /**
     * @return mysqli
     */
    private static function getMysqliByConfigData(): mysqli
    {
        return new mysqli(
            Config::get('db.default.host'),
            Config::get('db.default.user'),
            Config::get('db.default.password'),
            Config::get('db.default.database')
        );
    }

    /**
     * @param $query
     * @param $params
     * @return bool|\mysqli_result
     */
    protected function doQuery($query, $params = [])
    {

        $mysqli = self::getMysqliByConfigData();

        try {
            if (!empty($params)) {
                $statement = $mysqli->prepare($query);

                if ($statement === false) {
                    Handler::showDefaultError("Unable to handle query '$query'. Error - " . $mysqli->error);
                }

                $types = str_repeat('s', count($params));

                $statement->bind_param($types, ...array_values($params));

                $statement->execute();
                $queryResult = $statement->get_result();
            } else {
                $queryResult = $mysqli->query($query);
            }

            if (!empty($mysqli->error)) {
                Handler::showDefaultError("Unable to handle query '$query'. Error - " . $mysqli->error);
                return false;
            }

            if ($queryResult === false) {
                return true;
            }
        } catch (\Exception $e) {
            Handler::showDefaultError("SQL ERROR: {$e->getMessage()}");
            return false;
        }

        return $queryResult;
    }

    /**
     * @param $query
     * @param $params
     * @return array
     */
    public function selectFromDB($query, $params = []): array
    {
        $queryResult = $this->doQuery($query, $params);
        $result = [];
        if ($queryResult->num_rows > 0) {
            while ($row = $queryResult->fetch_assoc()) {
                $result []= $row;
            }
        }

        return $result;
    }

    protected function addInsertUpdateParams($params)
    {
        $paramsArray = [];
        foreach ($params as $param => $value) {
            $paramsArray []= "`$param` = ? ";
            $this->updateParamList[] = $value;
        }
        return implode(',', $paramsArray);
    }

    /**
     * @param $table
     * @param $params
     * @return bool|\mysqli_result|void
     */
    public function insert($table, $params)
    {
        $query = "INSERT INTO `$table` SET ";

        $query .= $this->addInsertUpdateParams($params);
        return $this->doQuery($query, $params);
    }
}