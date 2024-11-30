<?php

if(isset($_POST["submit"])){
    
    
    $emailvalue= $_POST["emailName"];
    $passvalue= $_POST["passName"];
   
    
    $passerror ="";
    $n=0;
    $a=0;
    include("connection.php");
    $connection = new Connection();
    $connection->selectDatabase('fancy');
    include("client.php");

    $sql = "SELECT email, password FROM
clients";

$result = mysqli_query($connection->conn, $sql);

if (mysqli_num_rows($result) > 0) {



while($row = mysqli_fetch_assoc($result)) {

if($row["email"]==$emailvalue){
    $n=1; 
    echo $passvalue;
    echo $row["password"];
    if(password_verify($passvalue , $row["password"])){
        $a=1;
        session_start();
    $_SESSION['emailS']= $emailvalue ;
     $_SESSION['passS']= $passvalue  ;
     header("Location:home.php");
    }

}


}

}
if($n==0){
    $passerror="email or password are invalid";
}
if($n==1 && $a==0){
    $passerror="password invalid";
}
}
    


?>
