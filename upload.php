<!DOCTYPE HTML>
<html>
<head>
<title>RESULT</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<?php
function generateRandomString($length = 6) {
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];
}
return $randomString;
}
$string = generateRandomString();
$target_dir = "up/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$newfile = $string . '.' . end($temp);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check !== false) {
echo "File is an image - " . $check["mime"] . ".";
$uploadOk = 1;
} else {
echo "File is not an image.";
$uploadOk = 0;
}
}
if ($_FILES["fileToUpload"]["size"] > 5000000) {
echo "Sorry, your file is too large.";
$uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp" && $imageFileType != "gif" ) {
echo "Sorry, only JPG, JPEG, PNG, WEBP & GIF files are allowed.";
$uploadOk = 0;
}
if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.";
} else {
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "up/" . $newfile)) {
echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
echo "<br>Visit <a href='up/" . $newfile . "'>this link</a> to see image."; 
echo "<br><a href='" . $newfile . "'>embed link</a>.";
} else {
echo "Sorry, there was an error uploading your file.";
}
}
?>
</body>
</html>
