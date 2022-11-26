<?php

session_start();
$connect=new mysqli('localhost','root','','payhere');
if($connect->connect_error)
{
    echo "Conneted failed";
    die;
}

if(isset($_POST['Submit']))
{
$name=$_POST['full'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$contact=$_POST['contact'];
$id=$_POST['id'];
$in=$_POST['in'];
$out=$_POST['out'];

    
    $check_email =mysqli_query($connect,"SELECT email FROM payhere where email ='$email'");
    {
        if(mysqli_num_rows($check_email)>0)
        {
            echo "Email Already Exist";
        }
        else
        {   
                date_default_timezone_set('Asia/Kolkata');
                $date=date('y-m-d');
            if($_SERVER["REQUEST_METHOD"]=="POST" && $in<$out)
            {
                $sql="INSERT INTO payhere(Name,Email,DOB,ContactNumber,ID,CheckIn,Checkout) VALUES ('$name','$email','$dob','$contact','$id','$in','$out')";
  
                if(mysqli_query($connect,$sql))
                {
                    // echo "Successfully Insert";
                    include 'thank.html';

                    
                }
            }
            else
            {
                echo "Please Enter Valid Date...";
            }
           
        }
    }
    
}


?>