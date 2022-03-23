<?php
    ob_start();
    session_start();
    $current_file=$_SERVER['SCRIPT_NAME'];
    function login()
    {
        if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
        {
            return true;
        }
        else
        {
          return false;
        }
        
    }
    function getuserfield($field)
    {
        global $connc;
        $id= $_SESSION['user_id'];
        $query="SELECT `$field` FROM `users` WHERE `id`=$id";
        if($queryrun= @mysqli_query($connc,$query))
        {
            $numrows=mysqli_num_rows($queryrun);
            if($numrows==1) 
        {
            $row= mysqli_fetch_row($queryrun);
             return $row[0];
        }
        }
    }
?>