<?php require_once '../template/headerNoLogin.php';?>
<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">

<?php
if (isset($_POST['submit'])) {
    require_once ('config.php');
 try {
 $connection = new PDO($dsn, $username, $password, $options);
 $new_user = array(
 "firstname" => $_POST['firstname'],
 "lastname" => $_POST['lastname'],
 "password" => $_POST['password'],
 "age" => $_POST['age'],
 "location" => $_POST['location']
);
$sql = sprintf("INSERT INTO %s (%s) values (%s)", "users",
 implode(", ", array_keys($new_user)),
 ":" . implode(", :", array_keys($new_user)));
$statement = $connection->prepare($sql);
$statement->execute($new_user);
 } catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
 }
}
?>

<h2>Please register your details</h2>
 <form method="post">
 <label for="firstname">First Name</label>
 <input type="text" name="firstname" id="firstname" required>
 <label for="lastname">Last Name</label>
 <input type="text" name="lastname" id="lastname" required>
 <label for="password">Password</label>
 <input type="password" name="password" id="password" required>
 <label for="age">Age</label>
 <input type="text" name="age" id="age">
 <label for="location">Location</label>
 <input type="text" name="location" id="location">
 <input type="submit" name="submit" value="Submit">
 </form>
 <a href="index.php">Back to home</a>

<?php require_once '../template/footer.php';?>