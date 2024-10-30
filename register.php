<?php
include('config.php');
$error_msg=array();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile']; 
    $location = $_POST['location'];
    $date = date('Y-m-d');
    if($mobile != "") {
        $result = mysqli_query($con,"SELECT * FROM user WHERE mobile = '$mobile'"); 
        
        if (mysqli_num_rows($result)==0) {
            if(preg_match('/^[0-9]{10}+$/', $mobile))
            {
            $sql = "INSERT INTO user (name, mobile, location, date) VALUES ('$name', '$mobile', '$location', '$date')";
            if (mysqli_query($con, $sql)) {
                $returnmessage = "User Registered successfully";
                $encoded_variable = urlencode($returnmessage);
                header("Location: index.php?returnmessage=$encoded_variable");
            } else {
               $returnmessage= "Error Occured Please Try again: " . mysqli_error($con);
               $encoded_variable = urlencode($returnmessage);
                header("Location: index.php?returnmessage=$encoded_variable");
            }
        }
        else
        {
            $returnmessage= "Invalid Mobile number" . mysqli_error($con);
            $encoded_variable = urlencode($returnmessage);
            header("Location: index.php?returnmessage=$encoded_variable");  
        }
           
        }else{
            $returnmessage= "Mobile number already exist.. " . mysqli_error($con);
            $encoded_variable = urlencode($returnmessage);
            header("Location: index.php?returnmessage=$encoded_variable");
    
        }
    }
    else{
        $returnmessage= "Mobile number is reqired.. " . mysqli_error($con);
        $encoded_variable = urlencode($returnmessage);
         header("Location: index.php?returnmessage=$encoded_variable");
       
    }
     
}


    ?>