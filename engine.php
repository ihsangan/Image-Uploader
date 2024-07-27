<?php
$host = $_SERVER["SERVER_NAME"];
$query = $_GET["img"];
$img = "up/$query";
$link = "https://$host/$img";
$url = "https://$host/$query";
$cdn = "https://img.isan.eu.org/$host/$img";
$disp = "$cdn?format=base";
$prev = "$cdn?w=1200&h=1200&quality=70";
$webp = "$cdn?format=webp";
if (file_exists($img)) {
    $time = date("D, d M Y H:i:s", filemtime($img));
    $size = formatBytes(filesize($img));
    list($width, $height) = getimagesize($img);
    $wxh = "{$width}x{$height}";
    $color = GenerateRandomColor();
} else {
  header("HTTP/1.1 404 Not Found"); die();
}
function formatBytes($size, $precision = 2) {
  $base = log($size, 1024);
  $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');
  return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
}
function GenerateRandomColor() {
  $color = '#';
  $colorHexLighter = array("0","A","F" );
  for($x=0; $x < 6; $x++):
  $color .= $colorHexLighter[array_rand($colorHexLighter, 1)]  ;
  endfor;
  return substr($color, 0, 7);
}
?>