<?php
include_once(__DIR__.'/classes/db.php');

  if(isset($_POST["submit"]))
{
    $name=$_POST["name"];
    $mobile=$_POST["mobile"];
    $email=$_POST["email"];  
    $dateofbirth=$_POST["dateofbirth"];
    $dateofjoining=$_POST["dateofjoining"];
    if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
      echo "Invalid email address!";
      $signup = false;
  } else {
      echo "Valid email address!";
      $signup = false;
  }
}

if($signup){
  if(!$error){
      echo 'something went wrong';
      
  }else{ 
  }
}

$database=$conn->dbconnect();
try{
$sql1="insert into cons (name, mobile, email, dateofbirth, dateofjoining) VALUES ('$name', '$mobile', '$email', '$dateofbirth','$dateofjoining');";
$res1=$database->query($sql1);
}
catch(exception $e)
{
  echo $e->getmessage();
}
?>