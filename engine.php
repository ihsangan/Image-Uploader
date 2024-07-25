<?php
$host = $_SERVER["SERVER_NAME"];
$query = $_GET["img"];
$img = "up/$query";
$link = "https://$host/$img";
$url = "https://$host/$query";
$prev = "https://i0.wp.com/$host/$img?w=1200&h=1200&quality=70";
if (file_exists($img)) {
    $time = filectime($img);
} else {
  header("HTTP/1.1 404 Not Found"); die();
}
?>