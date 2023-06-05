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
    $signup = true;
}
}
if($signup){  

  $database=db::dbconnect();
try{
  
  $stmt = $database->prepare("INSERT INTO cons (name, mobile, email, dateofbirth, dateofjoining) VALUES (?, ?, ? ,?, ?)");
  $stmt->bind_param("sssss", $name, $mobile, $email, $dateofbirth, $dateofjoining);
  $stmt->execute();
   ?>
     <script>
  alert("Inserted Sucessfully");
  </script>
  <?php
  header('location:api_test.php');

}
catch(exception $e)
{
  echo $e->getmessage();
}
}
else{
  echo"Failed";
}

?>