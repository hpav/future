<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 14.07.2018
 * Time: 21:20
 */

namespace Models;

use Carbon\Carbon;

class Comments
{
    private $link = null;

    function __construct()
    {
        $this->setConnect();
    }

    function add($name, $message)
    {
        return (bool)mysqli_query(
            $this->link,
            "INSERT INTO `comments` (`name`,`message`,`date_create`) VALUES ('{$name}','{$message}',NOW());"
        );
    }

    function get()
    {
        $comments = [];
        $res = mysqli_query(
            $this->link,
            "SELECT *  FROM `comments` ORDER BY `date_create` DESC"
        );


        while ($row = $res->fetch_assoc()) {
            $obCarbon = Carbon::createFromFormat(
                "Y-m-d H:i:s",
                $row["date_create"]
            );

            $comments[] = [
                "name" => $row["name"],
                "message" => $row["message"],
                "date" => $obCarbon->format("H:i d.m.Y"),
            ];
        }
        return $comments;
    }

    private function setConnect()
    {
        $this->link = mysqli_connect(
            DB_HOST,
            DB_USER,
            DB_PASS,
            DB_NAME
        );
    }
}
