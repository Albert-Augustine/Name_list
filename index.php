<!DOCTYPE html>
<html>
<body>
	<form method="post">
		<label>Name:</label><input type="text" name="name"><br><br>
		<input type="submit" value="submit">
	</form>
  <?php
    $conn = mysqli_connect("localhost", "root", "user123", "albert");
    $name = $_POST['name'];
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO name_list (name)VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close(); 
  ?>
</body>
</html> 