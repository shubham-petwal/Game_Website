	<!-- Header with Navigation -->
    <div id="header">
           
			<h1>Games You Love Playing<hr><?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
			<ul id="navigation">
				<li><a id="link-home" href="#home">Home</a></li>
				<li><a id="link-about" href="#about">About Us</a></li>
                <li><a id="link-inst" href="#inst">Instructions</a></li>
				<li><a id="link-gt" href="#gt">Guess It!!</a></li>
                <li><a id="link-rp" href="#rp">Rock Paper!!</a></li>
				
				<li><a id="link-contact" href="#feed">Feedback</a></li>
				<li><a id="link-contact" href="#td">Todo</a></li>
				<li><a id="link-logout" href="logout.php">Logout</a></li>
			</ul>
			<!-- <button class="btn btn-dark"  style= "margin-left:100px"><a href = "logout.php">Log Out</a></button> -->
		</div>

	</body>
</html>
