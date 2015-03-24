<?php
/**
 * Created by PhpStorm.
 * User: sunan
 * Date: 2015/3/24
 * Time: 22:55
 */
function db_connect(){
    $conn = new mysqli('localhost','root','','bookmarks');
    if(mysqli_connect_errno()){
        throw new Exception("error connect error");
    }else{
        return $conn;
    }
}