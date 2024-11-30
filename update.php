

<?php
session_start();


include("database.php");
if($_SERVER['REQUEST_METHOD']=='GET'){
    
   $sql = "SELECT id, firstname, lastname,email FROM Clients
WHERE id=$_GET[idUpdated]";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

        $emailvalue = $row['email'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $_SESSION['emailvalue']=$row['email'];
        
       }



}
}



$firsterror="";
$emailerror ="";

if(isset($_POST["submit"])){
    
    $firstname= $_POST["firstName"];
    $lastname= $_POST["lastname"];
    $emailvalue= $_POST["emailValue"];
   
    $n=0;
    include("database.php");
    $sql = "SELECT email FROM
clients";

$result = mysqli_query($conn, $sql);

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
    }else if(preg_match("/\w+(@gmail.com){1}$/",$emailvalue)==0){
 $emailerror=" please enter a valid email";
    
    }else if($n==1 && $_SESSION['emailvalue']!=$emailvalue ){
        $emailerror= "email already exist";
    }else{
        $sql = "UPDATE Clients SET firstname='$firstname',lastname='$lastname',email='$emailvalue' WHERE
id=$_GET[idUpdated]";

if (mysqli_query($conn, $sql)) {

echo "Record updated successfully";

} else {

echo "Error updating record: " .
mysqli_error($conn);

}


       
     header("Location:read.php");
    

}




}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5 ">

        <h2>UPDATE</h2>



 <!-- <div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong> error message</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  </button>
  </div> -->

        <br>
        <form method="post">
            
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="fname">First Name:</label>
                    <div class="col-sm-6">
                        <input value="<?php if(isset($firstname)) echo $firstname  ?>"  name="firstName"  class="form-control" type="text" id="fname" name="firstName">
                        <span style="color: red;"><?php if(isset($firstname)) echo $firsterror ?></span>
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="lname">Last Name:</label>
                    <div class="col-sm-6">
                        <input value="<?php if(isset($lastname)) echo $lastname  ?>" name='lastname' name="lastName"  class="form-control" type="text" id="lname" name="lastName">
                        <span  style="color: red;"><?php if(isset($lastname)) echo $firsterror ?></span>
                    </div>
            </div>
            <div class="row mb-3 ">
                    <label class="col-form-label col-sm-1" for="email">Email:</label>
                    <div class="col-sm-6">
                        <input value="<?php if(isset($emailvalue)) echo $emailvalue  ?>" name="emailValue" class="form-control" type="email" id="email" name="email">
                        <span id="span1" style="color: red;"><?php if(isset($emailvalue)) echo $emailerror ?></span>
                    </div>
            </div>
            



<!-- <div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>success Message</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
</button>
</div>   -->
      

            <div class="row mb-3">
                    <div class="offset-sm-1 col-sm-3 d-grid">
                        <button name="submit" type="submit" class=" btn btn-primary">Update</button>
                    </div>
                    <div class="col-sm-1 col-sm-3 d-grid">
                        <a href="read.php" class="btn btn-outline-primary" >Cancel</a>
                    </div>
            </div>
            
            
            
            
            
        </form>


    </div>


 </body>
</html>