<?php
$conn = new mysqli('localhost','root','ritu','printwithus');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
  }
  else{
    session_start();
    if(true)
    {
       if(empty($_POST['email']) || empty($_POST['password']))
       {
            echo "Fill in the blanks";
       }
       else
       {
            $query="select * from users where email='".$_POST['email']."' and password='".$_POST['password']."'";
            $result=mysqli_query($conn,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['email'];
                header("Location: index.php"); 
                exit;
            }
            else
            {
                header("Location: unsuccessfulLogin.php"); 
                exit;
            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }

  }
?>