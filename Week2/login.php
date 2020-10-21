<h2>LOGIN to the Program</h2>
<?php
//user feedback
if(isset($_GET["e"]))
{
        $e = $_GET["e"];
        if($e == 1)
        {   
                echo("Error Number 1: Incorrect Login, please access to math lab");
                
        }
        if($e == 2)
        {
     
                echo("Error Number 2");
                
        }
        if($e == 3)
        {
                 
                echo("Error Number 3");
                
        }
        if($e == 4)
        {
                 
                echo("Error Number 4");
                
        }
}
 ?>

<form method ="POST" action= "_auth.php">
<input type="email" name="email" required placeholder="E-mail">
        <br>
        <input type="password" name="password" required placeholder="Password">
        <br>
        <button type="submit">LOGIN</button>


</form>