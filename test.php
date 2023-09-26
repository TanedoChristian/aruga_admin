<?php
	include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style>
		.btn{
			background-color: red;
			border: none;
			color: white;
			padding: 5px 5px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 20px;
			margin: 4px 2px;
			cursor: pointer;
			border-radius: 20px;
		}
		.green{
			background-color: #199319;
		}
		.red{
			background-color: red;
		}
		table,th{
			border-style : solid;
			border-width : 1;
			text-align :center;
		}
		td{
			text-align :center;
		}
	</style>	
</head>
<body>
	<form method="get">
	<?php 
		$query = mysqli_query($connect,"select * from users");

		if(mysqli_num_rows($query)>0){
			echo "	<table>";
			echo "	<tr>";
			echo "		<th>Course Name</th>";
			echo "		<th>Course Status</th>";
			echo "		<th>Toggle</th>";
			echo "	</tr>";

			while ($row = mysqli_fetch_assoc($query)) 
			{ 
				echo "<tr>";
				echo "	<td>".$row['firstname']."</td>";
				echo "	<td>".$row['status']."</td>";
				echo "	<td>";
					if($row['status']=="active"){
						echo "<a href=deactivate.php?id=".$row['user_id']." class='btn red'>Deactivate</a>";
					}
					else{ 
						echo "<a href=activate.php?id=".$row['user_id']." class='btn green'>Activate</a>";
					}
				echo "	</td>";
				echo "</tr>";
			}
			echo "	</table>";
		}

	?>
	</form>
</body>
</html>
