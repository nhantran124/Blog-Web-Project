<?php
include_once 'Connect.php';
$List_sql = mysqli_query($mysqli, "SELECT * FROM users WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>
<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="add.html">Add New User</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Name</td>
			<td>Email</td>
			<td>phone_number</td>
			<td>Update</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['email']."</td>";
			echo "<td>".$res['phone_number']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Bạn có đồng ý xoá không?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>