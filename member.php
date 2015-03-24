<?php
/**
 * Created by PhpStorm.
 * User: sunan
 * Date: 2015/3/25
 * Time: 0:16
 */
require_once('bookmark_fns.php');
session_start();
$username = $_POST['username'];
$passwd = $_POST['passwd'];
if($username && $passwd){
    try{
        login($username,$passwd);
        $_SESSION['valid_user']=$username;
    }
    catch(Exception $e){
        do_html_header('Problem:');
        echo 'You could not be logged in. You must be logged in to view this page.';
        do_html_url('login.php', 'Login');
        do_html_footer();
        exit;
    }
}
do_html_header("HOME");
check_valid_user();

?>