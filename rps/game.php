<?php

// Demand a GET parameter
// if ( ! isset($_GET['username']) || strlen($_GET['username']) < 1  ) {
//     die('Name parameter missing');
// }

// // If the user requested logout go back to index.php
// if ( isset($_POST['logout']) ) {
//     header('Location: index.php');
//     return;
// } 

// Set up the values for the game...
// 0 is Rock, 1 is Paper, and 2 is Scissors
$names = array('Rock', 'Paper', 'Scissors');
$human = isset($_POST["human"]) ? $_POST['human']+0 : -1;

$computer = rand(0,2);
// $computer = ; // Hard code the computer to rock
// TODO: Make the computer be random
// $computer = rand(0,2);

// This function takes as its input the computer and human play
// and returns "Tie", "You Lose", "You Win" depending on play
// where "You" is the human being addressed by the computer
function check2($computer, $human) {
    // For now this is a rock-savant checking function
    // TODO: Fix this
    // if ( $human == 0 ) {
    //     return "Tie";
    // } else if ( $human == 1 ) {
    //     return "You Win";
    // } else if ( $human == 2 ) {
    //     return "You Lose";
    // }
    // return false;
    if ( $human == $computer ) {
        return "Tie";
    } else if ( ($human == 0 && $computer == 2) || ($human == 1 && $computer == 0) || ($human == 2 && $computer == 1) ) {
        return "You Win";
    } else {
        return "You Lose";
    }
}

// Check to see how the play happenned
$result = check2($computer, $human);

?>
<!DOCTYPE html>
<html>
<head>
<title>RPS Game</title>
<?php require_once "bootstrap.php"; ?>
<style>
        body{
            background-color: #b1e583;
        }
        .fo{
            margin-left:-180px;
        }
        </style>
</head>
<body>
<div class="container">
<!-- <h1>Rock Paper Scissors</h1> -->
<?php
if ( isset($_REQUEST['username']) ) {
    echo "<p>Welcome: ";
    echo htmlentities($_REQUEST['username']);
    echo "</p>\n";
}
?>
<form method="post" class="fo">
<select name="human" style="background-color:white;">
<option value="-1">Select</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
<option value="3">Test</option>
</select> &nbsp; &nbsp; &nbsp;
<input type="submit" value="Play" style="background-color:black; color:white;"> 
</form>
<br>
<br>

<pre style="margin-left:-200px; width:600px;">
<?php
if ( $human == -1 ) {
    print "Please select a strategy and press Play.\n";
} else if ( $human == 3 ) {
    for($c=0;$c<3;$c++) {
        for($h=0;$h<3;$h++) {
            $r = check2($c, $h);
            print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
        }
    }
} else {
    print "Your Play=$names[$human] | Computer Play=$names[$computer] Result=$result\n";
}
?>
</pre>
</div>
</body>
</html>
