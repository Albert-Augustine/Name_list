<!DOCTYPE html>
<html>
<body>
	<form method="post">
		<label>Name:</label><input type="text" name="name"><br><br>
    <label>Name_id:</label><input type="text" name="name_id"><br><br>
    <input type="submit" value="submit" name="submit">
    <input type="submit" value="Delete" name="delete">
    <input type="submit" value="UPDATE" name="update">
	</form>
  <?php
    $conn = mysqli_connect("localhost", "root", "user123", "albert");
    $name = $_POST['name'];
    $nameid = $_POST['name_id'];
    $timestamp = time();
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_POST['submit'])) {
      $sql = "INSERT INTO name_list (name,timestamp)VALUES ('$name','$timestamp')";
      if ($conn->query($sql) === TRUE) {
        $name_id = $conn->insert_id;
        echo "$name is added to field on the time $timestamp at id $name_id";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    if (isset($_POST['delete'])) {
      $sql1 = "DELETE FROM name_list WHERE name_id='$nameid' OR name='$name'";
      if ($conn->query($sql1) === TRUE) {
        echo "$name is delected according to id $nameid";
      } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
      }
    }
    if (isset($_POST['update'])) {
      $sql2 = "UPDATE name_list SET name='$name' WHERE name_id='$nameid'" ;
      if ($conn->query($sql2) === TRUE) {
        echo "$name is updated according to id $nameid";
      } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
      }
    }
    $conn->close(); 
  ?>
</body>
</html> 