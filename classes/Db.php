<?php

namespace Coursegator\Classes;

class Db
{
    //database

    private $conn;




    //credentials
    //$servername, $username, $password, $dbname

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->conn = mysqli_connect($servername, $username, $password, $dbname);
    }


    public function __destruct()
    {
        mysqli_close($this->conn);
    }




    function insert($table, $fields, $values)
    {
        $sql = "insert into $table($fields) values($values)";
        $isInserted = mysqli_query($this->conn, $sql);
        return $isInserted;
    }



    function update($table, $set, $condition)
    {
        $sql = "update $table set $set where $condition";
        $isUpdated = mysqli_query($this->conn, $sql);
        return $isUpdated;
    }








    function delete($table, $condition)
    {
        $sql = "delete from $table where $condition";
        $isDeleted = mysqli_query($this->conn, $sql);
        return $isDeleted;
    }





    function select($fields, $table, $others = null)            //default value of $others is null as we want it optional
    {
        $sql = "SELECT $fields FROM $table";

        //if $others added then concat to the query
        if ($others !== null) {
            $sql .= " $others";
        }

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            $rows = [];
        }
        return $rows;
    }





    //selection limit one

    function selectOne($fields, $table, $others = null)
    {
        $sql = "SELECT $fields FROM $table";

        if ($others !== null) {
            $sql .= " $others";
        }

        $sql .= " limit 1";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            // output data of each row
            $row = mysqli_fetch_assoc($result);
        } else {
            $row = [];
        }
        return $row;
    }








    function selectJoin($fields, $tables, $on, $others = null)
    {
        $sql = "SELECT $fields FROM $tables on $on";

        //if $others added then concat to the query
        if ($others !== null) {
            $sql .= " $others";
        }

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            $rows = [];
        }
        return $rows;
    }









    function selectJoinOne($fields, $tables, $one, $others = null)                      //we will not use it here
    {
        $sql = "SELECT $fields FROM $tables on $one";

        if ($others !== null) {
            $sql .= " $others";
        }

        $sql .= " limit 1";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            // output data of each row
            $row = mysqli_fetch_assoc($result);
        } else {
            $row = [];
        }
        return $row;
    }



    public function getConn(){                    //getter
        return $this->conn;
    }
}
