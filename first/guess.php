<?php
  $guess=isset($_POST['guess'])?$_POST['guess']:'';
  function check($guess){
    if($guess==''){
      return 'Please enter a number!';
    }
    else if(!is_numeric($guess)){
      return 'Alphabets NOT allowed!!!';
    }
    else if($guess==16){
      return "CONGRATS!!! You are invited to the party :)";
    }
    else if($guess<16){
      return "Guess is too low";
    }
    else{
      return "Guess is too high";
    }
  }
  $result=check($guess);
?>
<h1>Welcome to my Birthday guessing game</h1><br><br>
<form method="post">
<input type="text" name="guess" placeholder="Enter the date!" style="background-color:white;">
<input type="submit" value="Submit" style="background-color:black; color:white;"><br><br>
</form>
<p>
<?php
echo $result;
?>
</p>