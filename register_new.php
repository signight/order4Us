<?php
/**
 * Created by PhpStorm.
 * User: sunan
 * Date: 2015/3/24
 * Time: 22:34
 */
require_once('bookmark_fns.php');
$username = $_POST['username'];
$email = $_POST['email'];
$passwd = $_POST['passwd'];
$passwd2 = $_POST['passwd2'];
session_start();
try{
    if(!filled_out($_POST)){
        throw new Exception ("You have not filled the form");
    }
    if(!valid_email($email)){
        throw new Exception ("You have not filled the form correct Email");
    }
    if($passwd != $passwd2){
        throw new Exception("not same password");
    }
    if(strlen($passwd)<6||strlen($passwd)>16){
        throw new Exception('not comfortable password');
    }
    register($username,$email,$passwd);
    $_SESSION['valid_user']=$username;
    do_html_header("success");
    echo "successful";
    do_html_url("member.php","goto home");
    do_html_footer();
}
catch(Exception $e){
    do_html_header("Problem");
    echo $e->getMessage();
    do_html_footer();
    exit;
}
?>