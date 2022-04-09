<?php
// session_start();
if(isset($_SESSION["uname"])){
    echo "<center><h1>Welcome </h1></center>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.container{
  margin-left:100px;
  font-size:20px;
}
.errorColor{
	background-color: rgba(255, 0, 0,1);
	color: white;
	font-weight: bold;
  padding: 5px;
  border-radius: 5px;
}

</style>
</head>
<!--  -->
<?php
//
// <?php
// all required variables defined here

$nameError = $emailError = "";

$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameError = "Name is mandatory";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameError = "Only letters allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailError = "Email is mandatory";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Invalid email format";
    }
  }
    
  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }

}

function test_input($data) {
  $data = trim($data);   
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//



?> 

    
  
<body>



<div class="container">
<form method="post"  > 
    <label for="fname">Name:</label>
    <span class="errorColor">* <?php  echo $nameError;?></span>
    <br>
    <input type="text" id="fname" size="100" style="width:500px;" name="name"  style="background-color:white;" placeholder="Your name..">
    <br><br>
    <label for="lname">E-mail:</label>
    <span class="errorColor">* <?php echo $emailError;?></span>
    <br>
    <input type="text" id="lname" name="email"  style="width:500px;" style="background-color:white;" placeholder="Your Email..">
    
    <br><br>
    <label for="country" >Country:</label>
    <select id="country"  style="background-color:white;" name="country">
    <option value="India"  style="width:500px;">India</option>
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
      <option value="China">China</option>
      <option value="Russia">Russia</option>
    </select>
<br><br>
    <label for="comments">Comments:</label><br>
    <textarea id="comments"  style="background-color:white;width:500px;" name="comments" placeholder="Write something.."></textarea>
    <br>
    <!-- <input type="submit" value="Validation" formaction="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
    <br>
    <input type="submit" value="Submit" name="submit"  style="background-color:black;color:white">
    <!-- <input type="submit" style = "margin-left:80%" value="Back" formaction="game_website.php"> -->
</form>

<?php
//
$con = mysqli_connect("localhost","root","","php_game_web");

//   if($con){
//     echo "Connection is Succesfull";
// }
// else{
//     echo "COnnection failed";
// }
if(isset($_POST['submit'])){
  if($nameError=="" && $emailError=="" ){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $message = $_POST['comments'];
    $sql = "INSERT INTO userinfodata (name,email,country,comments) VALUES ('$name','$email','$country','$message')";
    if(mysqli_query($con,$sql)){
        echo "\nFeedbak inserted successfully";
    }
    else{
        echo "\nFeedback insertion failed";
    }
  }
  else{
    echo "\nPlease fill the form correctly";
  }
}
?>

</div>

</body>
</html>
