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
  $smmt = $database->prepare("SELECT * FROM cons ORDER BY userid DESC LIMIT 1");
  $smmt->execute();
  $result=$smmt->fetchAll();
  print_r($result);
  if ($result) {
    echo "<table border='1'><tr><th>Employee ID</th><th>Employee Name</th><th>Employee Mobile Number</th><th>Employee Email ID</th><th>Date Of Birth</th><th>Date Of Joining</th></tr>";
     echo $result['userid'];
    foreach ($result as $row) {
      echo "<tr><td>".$row["userid"]."</td><td>".$row["name"]."</td><td>".$row["mobile"]."</td><td>".$row["email"]."</td><td>".$row["dateofbirth"]."</td><td>".$row["dateofjoining"]."</td></tr>";
    }
  
    echo "</table>";
  } else {
    echo "Doesn't work";
  }
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