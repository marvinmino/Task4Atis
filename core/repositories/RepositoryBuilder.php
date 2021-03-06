<?php

namespace App\Core\Repository;

use PDO;

class RepositoryBuilder
{
    /**
     * The PDO instance.
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Create a new QueryBuilder instance.
     *
     * @param PDO $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Select all records from a database table.
     *
     * @param string $table
     */
    public function selectAll($table)
    {   $sql="select * from {$table}";
        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function selectSortAll($table,$sort)
    {
        $statement = $this->pdo->prepare("select * from {$table} order by {$sort} asc");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function selectAllOneCon($table, $conData, $con)
    {   $sql="SELECT * FROM " . $table . " where " . $conData . "=:con";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':con', $con);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function selectSortAllOneCon($table, $conData, $con,$sort,$order)
    {
        $statement = $this->pdo->prepare("SELECT * FROM  $table  where  $conData = :con order by $sort $order");
        // die(var_dump($statement));
        $statement->bindParam(':con', $con);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function selectAllTwoCon($table, $conData, $con, $conData1, $con1)
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . $table . " where " . $conData . "=:con and " . $conData1 . "=:con1");
        $statement->bindParam(':con', $con);
        $statement->bindParam(':con1', $con1);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    /**
     * Insert a record into a table.
     *
     * @param  string $table
     * @param  array  $parameters
     */
    public function insert($table, $parameters)
    {   
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {#
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (\Exception $e) {
            //
        }
    }
    public function merge($table1,$table2,$join1,$join2,$con,$conval){
        $statement = $this->pdo->prepare("SELECT * from {$table1} as u INNER JOIN {$table2} as r ON u.{$join1}=r.{$join2} WHERE {$con}=:conval");
        
        $statement->bindParam(':conval', $conval);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function manytomany($table1,$table2,$table3,$con,$conval){
        $statement = $this->pdo->prepare("SELECT * FROM {$table1} JOIN {$table2} on {$table1}.id={$table2}.{$table1}Id JOIN {$table3} on {$table3}.id={$table2}.{$table3}Id where {$con}=:conval");
        
        $statement->bindParam(':conval', $conval);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function manytomanytwo($table1,$table2,$table3,$con,$conval,$con2,$conval2){
        $statement = $this->pdo->prepare("SELECT * FROM {$table1} JOIN {$table2} on {$table1}.id={$table2}.{$table1}Id JOIN {$table3} on {$table3}.id={$table2}.{$table3}Id where {$con}=:conval and {$con2}=:conval2");
        
        $statement->bindParam(':conval', $conval);
        $statement->bindParam(':conval2', $conval2);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function update($table, $element, $elementValue, $condition ,$conditionValue)
    {
        $sql = "update {$table} set {$element}=:elementValue where {$condition}=:conditionValue";
        
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->bindParam(':elementValue', $elementValue);
            $statement->bindParam(':conditionValue', $conditionValue);
            $statement->execute();
        } catch (\Exception $e) {
            //
        }
    }
    public function delete($table,$condition ,$conditionValue)
    {
        $sql = "delete from {$table}  where {$condition}=:conditionValue";
        
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->bindParam(':conditionValue', $conditionValue);
            $statement->execute();
        } catch (\Exception $e) {
            //
        }
    }
}

