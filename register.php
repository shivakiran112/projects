<?php
require 'core.php';
require 'dbconnectivity.php';
if(login())
{
    echo 'You are already registered and logged in.';
}
else if(!login())
{
    if(isset($_POST['username'])&& isset($_POST['password'])&&isset($_POST['pass_again'])&&isset($_POST['firstname'])&&isset($_POST['surname']))
    {
        $username=$_POST['username'];$password=$_POST['password'];$pass_again=$_POST['pass_again'];$firstname=$_POST['firstname'];$surname=$_POST['surname'];
        $pass_hash=md5($password);
        if(!empty($username) && !empty($username) && !empty($username) && !empty($firstname) && !empty($firstname))
        {
             if($password != $pass_again)
             {
                 echo 'Passwords do  not match';
             }
             else
             {
          $query= "SELECT `username` FROM `users` WHERE `username`='$username'";
          if($queryrun= @mysqli_query($connc,$query))
          {
              $numrows=mysqli_num_rows($queryrun); 
              if($numrows==1)
              {
                  echo " Username already exits";
              }
              else if($numrows==0)
              {
                 $query=" INSERT INTO `users`(`id`, `username`, `password`, `firstname`, `surname`) VALUES (null,'$username','$pass_hash','$firstname','$surname')";
                 if($queryrun= @mysqli_query($connc,$query))
                 {
                 header('Location: success.php');
                 }
              }
           }
            }
       }
        else
        {
          echo " All fields are required";
        }
    }
?>
<h2>Sign up :</h2>
<form action="register.php" method="POST">
    Username:<br><input type="text" name="username" value="<?php if(isset($username)){echo $username;}?>"><br><br>
    Password:<br><input type="password" name="password"><br><br>
    password again:<br><input type="password" name="pass_again"><br><br>
    Firstname:<br><input type="text" name="firstname" value="<?php if(isset($firstname)){echo $firstname;}?>"><br><br>
    Surname:<br><input type="text" name="surname" value="<?php if(isset($surname)){echo $surname;}?>" ><br><br>
    <input type="submit" value="sign up">
</form>
<?php
}
?>