
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}
include ("connection.php");
$connection=new Connection();
include ("client.php");
$connection->selectDatabase("fancy");



$clients=[];
   //call the static selectAllClients method and store the result of the method in $clients
if(isset($_POST['submitB'])){

   $clients=Client::selectClientsByCity('clients',$connection->conn,$_POST['cities']);
}else {
   $clients=Client::selectAllClients("clients",$connection->conn);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* General Row Styling */
        

        /* Label Styling */
        .col-form-label {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        /* Center Select Box in Parent */
        .col-sm-6 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Custom Select Styling */
        .form-select {
            width: 400px; /* Full width of the container */
           
            padding: 10px 15px;
            font-size: 16px;
            font-weight: bold;
            color: #333;
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%); /* Dazzling background gradient */
            border: 2px solid #ff7a59;
            border-radius: 8px;
            appearance: none; /* Remove default dropdown styles */
            outline: none;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Add subtle shadow */
            margin-left: 200px;
        }

        /* Add Arrow for Dropdown */
        .form-select::after {
            content: '▼';
            font-size: 12px;
            color: #fff;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        /* Hover Effect */
        .form-select:hover {
            background: linear-gradient(135deg, #fda085 0%, #f6d365 100%);
            border-color: #ff9a76;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        /* Focus Effect */
        .form-select:focus {
            border-color: #f56a45;
            box-shadow: 0 6px 14px rgba(0, 123, 255, 0.5);
        }

        /* Option Styling */
        .form-select option {
            padding: 10px;
            font-size: 14px;
            color: #333;
            background: #fff;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <h2>List of users from database</h2>
    <a  class="btn btn-primary" href="signup2.php" role="button">Signup</a>

    <br>
    <br>
    <form method="post">

    <div class="input-group">
  <span class="input-group-btn">
   
    <button class="btn btn-success" type="submit" name="submitB">Search</button>
   
  </span>
  <div class="row mb-3">
            <label  class="col-form-label col-sm-1" for="cities">Cities:</label>
            <div  class="col-sm-6">
                <select style="margin-left=200px" name='cities' class="form-select">
                <option selected>Select your city</option>
           <?php

            include("City.php");
            $cities = City::selectAllCities('Cities',$connection->conn);
            foreach($cities as $city){
                echo "<option value='$city[id]' >$city[cityName]</option>";

            }

           ?>
                </select>
                </div>
   </div>
  </form>
    <table class="table">
       <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>city name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
 
        <?php
        

   


foreach($clients as $row){

    $city = City::selectCityById('cities',$connection->conn,$row['idCity']);


    echo "    <tr>
            <td>$row[id]</td>
            <td>$row[firstname]</td>
            <td>$row[lastname]</td>
            <td>$row[email]</td>
            <td>$city[cityName]</td>
            <td>
                <a  class='btn btn-success' role='button' href='update.php?updatedId=$row[id]'>Edit</a>
                                <a  class='btn btn-danger' role='button' href='delete.php?deletedId=$row[id]'>Delete</a>


            
            </td>
        </tr>";
}



        ?>

        

        </tbody>
        
    </table>
    </div>
    
</body>
</html>