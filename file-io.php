<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP IO</title>
</head>
<body>


 <?php
define("filepath", "data.txt");

 $firstName = $lastName = $gen = $dob = $email = $username = $pwd = "";
$firstNameErr = $lastNameErr = $genErr = $dobErr =$emailErr= $usernameErr = $pwdErr = "";

$flag = false;
$successfulMessage = $errorMessage = "";


if($_SERVER['REQUEST_METHOD'] === "POST") {
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gen = $_POST['gen'];
$dob = $_POST['dob'];
$username = $_POST['username'];
$pwd = $_POST['pwd'];


 if(empty($firstName)) {
$firstNameErr = "Required";
$flag = true;
}
if(empty($lastName)) {
$lastNameErr = "Required";
$flag = true;
}
if(empty($gen)) {
$genErr = "Required";
$flag = true;
}
if(empty($dob)) {
$dobErr = "Required";
$flag = true;
}if(empty($username)) {
$username = "Required";
$flag = true;
}if(empty($pwd)) {
$pwdErr = "Required";
$flag = true;
}
if(!$flag) {
$data = $username . "," . $pwd  ;
$res = write($data);
if($res) {
$successfulMessage = "Sucessfully saved.";
}
else {
$errorMessage = "Error while saving.";
}
}
}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

 function write($content) {
$file = fopen(filepath, "a");
$fw = fwrite($file, $content . "\n");
fclose($file);
return $fw;
}

?>

<p><span class="error"><h3>Form Submission</h3></span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <fieldset>
    <legend><label>***Basic Information***</label></legend>
  First Name: <input type="text" name="firstName">
  <span class="error">* <?php echo $firstNameErr;?></span>
  <br><br>
  Last Name: <input type="text" name="lastName">
  <span class="error">* <?php echo $lastNameErr;?></span>
  
  <br><br>
  Gender:
  <input type="radio" name="gen" value="female">Female
  <input type="radio" name="gen" value="male">Male
  <input type="radio" name="gen" value="other">Other
  <span class="error">* <?php echo $genErr;?></span>
  <br><br>

  Date of Birth: <input type="date" name="dob"
            min="1990-01-01" max="2050-12-31">
            <span class="error">* <?php echo $dobErr;?></span>

       <br><br> 
        Select Religion: 
           <select>  
           <option value = "Islam"> Islam  
           </option>  
           <option value = "Hindus"> Hindus   
           </option>  
           <option value = "Others"> Others  
           </option> 
       </select>

       </fieldset>
       <br><br>
    <fieldset>
      <legend><label>***Contact Information***</label></legend>

Present Address:
    <textarea id="comment1" name="comment1"></textarea>

    <br><br>

Permanent Address:</label>
    <textarea id="comment2" name="comment2"></textarea>

    <br><br>
    
    Phone Number:      <input type="tel" id="phone" name="phone"

    <br><br>
    
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <a href="https://github.com/MdYousufAfendi">Visit Github Account!</a>

  <br><br>
  
   
  </fieldset>
  <br><br>

  <fieldset>
    <legend><label>***Account Information***</label></legend>
    UserName: <input type="text" name="username">
  <span class="error">* <?php echo $usernameErr;?></span>
  
  <br><br>
  
  Password: <input type="password"  name="pwd">
    <span class="error">* <?php echo $pwdErr;?></span>

  </fieldset>
    <input type="submit" name="Save" value="Submit"> 


</form>


 <span style="color: green"><?php echo $successfulMessage; ?></span>
<span style="color: red"><?php echo $errorMessage; ?></span>

 <?php

 $fileData = read();
echo "<br><br>";
$fileDataExplode = explode("\n", $fileData);

 echo "<ol>";
for($i = 0; $i < count($fileDataExplode) - 1; $i++) {

 #explode(",", $fileDataExplode[$i]);
echo "<li>" . $fileDataExplode[$i] . "</li>";
}
echo "</ol>";

 function read() {
$file = fopen(filepath, "r");
$fz = filesize(filepath);
$fr = "";
if($fz > 0) {
$fr = fread($file, $fz);
}
fclose($file);
return $fr;
}
?>
<?-----------------------------------------------------------------------?>

<fieldset>
      <legend><label>***Login Form***</label></legend>
    <form action="data.txt">
      <div class="input-box">
        <input type="text" name="username"  autocomplete="off" required>
        <label for="">Username</label>
      </div>
    <br><br>
      <div class="input-box">
        <input type="password" name="password"  autocomplete="off" required>
        <label for="">Password</label>
      </div>
        <input type="submit" value="Login">
    </form>
    </fieldset>


<?php
    extract($_REQUEST);
    $file=fopen("data.txt","a");

    fwrite($file,"name :");
    fwrite($file, $username ."\n");
    fwrite($file,"Password :");
    fwrite($file, $pwd ."\n");
    fclose($file);
    
 ?>

</body>
</html>
