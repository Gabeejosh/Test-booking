<?php
$con=mysqli_connect("localhost","root","password","movie");
$response=array();
try{
if($con){
    $sql="SELECT * FROM cons";
    $result=mysqli_query($con,$sql);
    if($result){
        header("Content-Type:application/JSON");
        $i=0;
        while($row=mysqli_fetch_assoc($result)){
            $response[$i]["userid"] = $row["userid"];
            $response[$i]["name"] = $row["name"];
            $response[$i]["mobile"] = $row["mobile"];
            $response[$i]["email"] = $row["email"];
            $response[$i]["dateofbirth"] = $row["dateofbirth"];
            $response[$i]["dateofjoining"] = $row["dateofjoining"];
            $i++;
        }
        echo json_encode($response,JSON_PRETTY_PRINT);
    }
}
else{
    echo "Failed";
}
}
catch(exception $e)
{
  echo $e->getmessage();
}

?>
