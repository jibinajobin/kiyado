<!DOCTYPE html>
<?php include('config.php');?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIYADO</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<div class="container">
<h3>USER REGISTRATION</h3>
  <div class="row">
  <div class="col-md-4">
  <form method="POST" action="register.php">
    <label for="fname">First Name</label>
    <input type="text" id="name" name="name" placeholder="Your name..">

    <label for="mobile">Mobile</label>
    <input type="text" id="mobile" name="mobile" placeholder="Your last name..">
    <?php if (isset($_GET['error_msg'])) {
    // Decode the message and display it
    $message = urldecode($_GET['error_msg']);
    echo "<p> " . htmlspecialchars($message) . "</p>";
} else {
   // echo "<p>No message passed.</p>";
}
?>
    <label for="location">Location</label>
    <input type="text" id="location" name="location" placeholder="Your last name..">

    <input name="submit" type="submit" value="submit">
  </form>
  <label  style="color:red">
<?php
// Check if the message is set in the query string
if (isset($_GET['returnmessage'])) {
    // Decode the message and display it
    $message = urldecode($_GET['returnmessage']);
    echo "<p> " . htmlspecialchars($message) . "</p>";
} else {
   // echo "<p>No message passed.</p>";
}
?></label>
</div>


<div class="col-md-6">

<div class="row">
  <div class="col-md-8">
  <h3>USER DETAILS</h3>

<table>
  <tr>
    <th>SL.NO</th>
    <th>NAME</th>
    <th>MOBILE</th>
    <th>LOCATION</th>
    <th>ACTION</th>
  </tr>
  <?php
 $selectAll =mysqli_query($con,"select * from user");
 $number =   mysqli_num_rows($selectAll);
 if(mysqli_num_rows($selectAll)!=0)
 {
     $i=1;
     while ($row = mysqli_fetch_array($selectAll)) 
     { ?>                
 <tr>
  <td><?= $i ?></td>
  <td><?= $row['name']; ?></td>
  <td><?= $row['mobile']; ?></td>
  <td><?= $row['location']; ?></td>
  <td><a href="delete.php?id=<?php echo$row['id']; ?>"<button> <i class="material-icons"style="font-size:20px;color:red">delete</i></button></td>
 </tr>     
 <?php
    $i++;
    }
     }
 ?>     
</table>
</div>
</div>
</div>
</div>
</div>


</body>
</html>