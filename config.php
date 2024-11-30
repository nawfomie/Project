<?php


if(isset($_POST["submit"])){
    $firstname= $_POST["firstname"];
    $lastname= $_POST["lastname"];
    $emailvalue= $_POST["emailName"];
    $passvalue= $_POST["passName"];
    $idCity=$_POST["cities"];
    $firsterror="";
    $emailerror ="";
    $passerror ="";
    $n=0;
    include("connection.php");
    $connection = new Connection();
    $connection->selectDatabase('fancy');
    include("client.php");

    $sql = "SELECT email FROM
Clients";

$result = mysqli_query($connection->conn, $sql);

if (mysqli_num_rows($result) > 0) {



while($row = mysqli_fetch_assoc($result)) {

if($row["email"]==$emailvalue){
    $n=1;
}

}

} 
    if(empty($firstname) || empty($lastname)){
       $firsterror = "names must be filled";
    }else if(empty($emailvalue)){
        $emailerror= "email must be filled";
    }else if(empty($passvalue)){
       $passerror =  "password must be filled";
    }else if(preg_match("/\w+(@gmail.com){1}$/",$emailvalue)==0){
 $emailerror=" please enter a valid email";
    
    }else if($n==1){
        $emailerror= "email already exist";
    }else if(preg_match('/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/',$passvalue)==0){
       $passerror="password must contain 8 caracters and upercase cracters";
    }else{
        $client = new Client($firstname,$lastname,$emailvalue,$passvalue,$idCity);
        $client->insertClient('Clients',$connection->conn);


        session_start();
    $_SESSION['emailS']= $emailvalue ;
     $_SESSION['passS']= $passvalue  ;
     
     header("Location:home.php");
    

}
}
?>