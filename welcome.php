<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php 
include('header.php');
// all required variables defined here
?>			
		<!-- Home -->
		<div id="home" class="content">
			<h2>Home</h2>
			<p>Welcome to the world of games.</p><br>
			<p style="width:60%;">
			Games that are immersive and require strategy and problem-solving skills to win, 
			require players to remember and take in a lot of information. Regularly playing these 
			types of games can help improve children’s short and long-term memory and help the brain 
			process information quicker.
			Effective when increasing the KIDS skills, in cases such as
			 socialization, cooperation, problem-solving
			 (use of memory and mathematical skills), and the 
			 visuomotor coordination [3, 9, 48, 49]. Digital educational games may 
			 also provide models of appropriate learning practices.
			</p>
			<img style="float:right;margin-top:25px;border:4px solid black;" src="img/lap.jpg">
			</div>
		<!-- /Home -->
				<!--About -->
				<div id="about" class="panel">
			<div class="content">
				<h2 style="margin-left:5%;">About Us</h2><br>
				<?php 
include('about.php');
?>
			</div>
		</div>
		<!-- /About -->
		
		<!--Instructions -->
		<div id="inst" class="panel">
			<div class="content">
				<h2>Instructions</h2><br>
<p>Enter the range of numbers you want the random number to be between</p><br>
<p>Enter your guess</p><br>
<p>See if your guess is too high or too low</p><br>
<p>Change your guess</p><br>
<p>The computer will tell you how many guesses you had</div>
		</div>
		<!-- /Instructions -->
		<!-- gt -->
		<div id="gt" class="panel">
			<div class="content">
				<h2>Guess It Game</h2>
				
				<?php 
include('first/guess.php');
?>
</br>
				</p >

				</div>
		</div>
		<!-- /gt -->
				<!-- rp -->
				<div id="rp" class="panel">
			<div class="content">
				<h2 style="font-size:90px;">Rock Paper Scissor</h2><br><br>
				
				<?php 
include('rps/index.php');
?>
</br>
				</p >

				</div>
		</div>
		<!-- /rp -->
			
				<!-- Todo -->
				<div id="td" class="panel">
			<div class="content">
				<h2>Note ur tasks</h2>
				<?php 
include('todo.php');
?>
			</div>
		</div>
		<!-- /Todo-->
		<!-- Feedback -->
		<div id="feed" class="panel">
			<div class="content">
				<h2 style="margin-left:100px;">Feedback</h2>
				<?php 
include('form.php');
?>
			</div>
		</div>
		<!-- /Feedback-->
		
		<?php 
include('footer.php');


?>



		
	