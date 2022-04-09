<?php 
    // initialize errors variable
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "php_game_web");

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO tasks (task) VALUES ('$task')";
			mysqli_query($db, $sql);
			// header('location: todo.php');
		}
	}	

    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
    
        mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
		// header('location: welcome.php/#td');
        // header('location: todo.php');
    }
    
    ?>







<!DOCTYPE html>
<html>
<head>
	<title>ToDo List Application PHP and MySQL</title>
	<style>
		.heading{
			margin-left:180px;
		}
		.heading{
	width: 50%;
	margin: 30px auto;
	text-align: center;
	color: 	#6B8E23;
	background: #FFF8DC;
	border: 2px solid #6B8E23;
	border-radius: 20px;
}
.input_form {
	width: 70%; 
	margin: 30px auto; 
	border-radius: 5px; 
	padding: 10px;
	background: #FFF8DC;
	border: 1px solid #6B8E23;
}
form p {
	color: red;
	margin: 0px;
}
.task_input {
	width: 75%;
	height: 15px; 
	padding: 10px;
	border: 2px solid #6B8E23;
}
.add_btn {
	height: 39px;
	background: #FFF8DC;
	color: 	#6B8E23;
	border: 2px solid #6B8E23;
	border-radius: 5px; 
	padding: 5px 20px;
}

table {
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
	background: #FFF8DC;
	color:black;
}

tr {
	border-bottom: 1px solid #cbcbcb;
}

th {
	font-size: 19px;
	color: #6B8E23;
}

th, td{
	border: none;
    height: 30px;
    padding: 2px;
}

tr:hover {
	background: #E9E9E9;
}

.task {
	text-align: left;
}

.delete{
	text-align: center;
}
.delete a{
	color: white;
	background: #a52a2a;
	padding: 1px 6px;
	border-radius: 3px;
	text-decoration: none;
}
		</style>
</head>
<body>
	<div class="heading">
	</div>
	<form method="post" action="#td" class="input_form">
    <?php if (isset($errors)) { ?>
	<p><?php echo $errors; ?></p>
<?php } ?>
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>
    <table>
	<thead>
		<tr>
			<th>N</th>
			<th>Tasks</th>
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM tasks");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['task']; ?> </td>
				<td class="delete"> 
					<!-- <a href="welcome.php/#td" onclick="del_task(<?php echo $row['id']; ?>)">x</a>	 -->
					<a href="welcome.php?del_task=<?php echo $row['id'] ?>">x</a> 
				


				</td>
			</tr>
		<?php $i++; } ?>	
	</tbody>
</table>
</body>
</html>