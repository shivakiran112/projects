<?php
require 'core.php';
require 'dbconnectivity.php';
$logout= '<a href="logouts.php">Logout</a>';
if(login())
{
    $firstname=getuserfield('firstname');
    $surname=getuserfield('surname');
    echo 'welcome '.$firstname.'  '.$surname.'<br>';
    echo $logout;
}
else
{
  include 'loginform.php';
}
 
?>