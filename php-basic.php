
    <!DOCTYPE html>
<html>
<head>
<title>PHP HTML Form</title>
</head>
<body>
<h1>PHP HTML Form</h1>
<?php
$nameError = "";
$name = "";

 if($_SERVER['REQUEST_METHOD'] === "POST") {
if(empty($_POST['name'])) {
$nameError = "Value can't be empty";
}
else {
$name = test_input($_POST['name']);
}
}
 function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
<label for="name">NAME: </label>
<input type="text" name="name" id="name" value="<?php echo $name; ?>">
<span style="color: red"><?php echo $nameError; ?></span>
<input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
