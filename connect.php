<?php
$con = mysqli_connect('localhost', '??', '??', '??');
mysqli_query($con, 'SET NAMES utf8');

if(!$con) {
    echo "mysql 접속 에러";
    echo myspli_connect_error();
    exit;
}
?>
