<?php
//session_start();
//$_SESSION['counter'] = $_SESSION['counter']?? 0;
//$_SESSION['counter']++;
//echo $_SESSION['counter'];
//
session_name('myapp');
session_start(array(
    'cookie_lifetime' => 10
));
$_SESSION['name'] = 'bappy';
echo $_SESSION['name'];