<?php
session_start();
session_destroy();
    include("config.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Sign Up</title>
    <style>
        /* General Row Styling */
        .row {
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Label Styling */
        .col-form-label {
            font-size: 16px;
            font-weight: bold;
            color: #4a4a4a;
            margin-right: 15px; /* Adds spacing between label and select */
        }

        /* Center Select Box */
        .col-sm-6 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Dropdown Styling */
        .form-select {
            width: 100%; /* Makes the select box adapt to container width */
            max-width: 400px; /* Limits the maximum width */
            padding: 10px 15px;
            font-size: 16px;
            font-weight: bold;
            color: #333;
            border: 2px solid #6c757d; /* Gives a border */
            border-radius: 8px;
            background: linear-gradient(135deg, #f9f9f9, #e9ecef); /* Subtle gradient background */
            outline: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
        }

        /* Hover and Focus Effect */
        .form-select:hover,
        .form-select:focus {
            border-color: #007bff; /* Changes border color on hover/focus */
            background: linear-gradient(135deg, #e9f7fe, #dceefb); /* Light blue gradient */
            box-shadow: 0 6px 12px rgba(0, 123, 255, 0.2); /* Enhances shadow effect */
            color: #007bff;
        }

        /* Placeholder Styling */
        .form-select option:first-child {
            color: #6c757d;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .col-sm-6 {
                flex-direction: column;
                text-align: center;
            }

            .form-select {
                max-width: 100%; /* Full width on smaller screens */
            }

            .col-form-label {
                margin-bottom: 10px; /* Adds spacing between label and select */
            }
        }
    </style>
</head>
<body>

    <link rel="stylesheet" href="signup.css">
    
    <center>
<div class="form-container" >
        <h2>Sign Up</h2>
        <form action="" method="POST">
            <label for="email">First Name</label>
            
            <input value="<?php if(isset($firstname)) echo $firstname  ?>" name='firstname' class="controle"   placeholder="Enter First Name" style="width: 80%;padding: 10px;margin: 5px 15px 15px;border: 1px solid #ccc;border-radius: 4px;" >
            <span style="color: red;"><?php if(isset($firstname)) echo $firsterror ?></span>
            <label for="email">Last Name</label>
            
            <input value="<?php if(isset($lastname)) echo $lastname  ?>" name='lastname'  class="form-control"  a placeholder="Enter Last Name" style="width: 80%;padding: 10px;margin: 5px 15px 15px;border: 1px solid #ccc;border-radius: 4px;" >
            <span  style="color: red;"><?php if(isset($lastname)) echo $firsterror ?></span>
            <label for="email">Email:</label>
            
            <input value="<?php if(isset($emailvalue)) echo $emailvalue  ?>" name='emailName' type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email" >
            <span id="span1" style="color: red;"><?php if(isset($emailvalue)) echo $emailerror ?></span>
            <div class="row mb-3">
            <label class="col-form-label col-sm-1" for="cities">Cities:</label>
            <div class="col-sm-6">
                <select name='cities' class="form-select">
                <option selected>Select your city</option>
           <?php
            include("connection.php");
            $connection=new Connection();
            $connection->selectDatabase('Fancy');

            include("City.php");
            $cities = City::selectAllCities('Cities',$connection->conn);
            foreach($cities as $city){
                echo "<option value='$city[id]' >$city[cityName]</option>";

            }

           ?>
                </select>
                </div>
   </div>
            <label for="password">Password:</label>
            <input name='passName' type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" >
            <span style="color: red;"><?php if(isset($passvalue)) echo $passerror ?></span><br>
            

            <button name='submit' type="submit">signup</button>
            <p>do you already have an acc?  <a href="signup2.php">sign in</p>
        </form>
    </div>
</center>
  
</body>
</html>
