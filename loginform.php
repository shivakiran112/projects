<?php
if(isset($_POST['username']) && isset($_POST['password'] ))
{
$username = $_POST['username']; 
$password = $_POST['password'];
$pass_hash=md5($password);
if(!empty($username) && !empty($password))
{
    $query = "select `id` FROM `users` WHERE `username`='$username'  AND `password`= '$pass_hash'";
    if($queryrun= @mysqli_query($connc,$query))
    {
        $numrows=mysqli_num_rows($queryrun);
        if($numrows == 0)
        {   
            echo "unsucessfull login";
            
        }
        else if($numrows == 1) 
        {
            $row= mysqli_fetch_row($queryrun);
            $id=$row[0];
            $_SESSION['user_id']=$id;
            header("Location: index.php");  
           
        }
       
    }
    else
    {   
      echo "login unsuccessful";
    }
}
}
?>
<!--------------------------------------------------------------------->
<form action="<?php echo $current_file?>" method="POST">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" value="Log In"><br><br>
</form>

