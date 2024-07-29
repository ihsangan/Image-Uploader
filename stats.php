<?php
$dir = "up/";
$fi = new FilesystemIterator($dir, FilesystemIterator::SKIP_DOTS);
$files = iterator_count($fi);
$size = getDirectorySize($dir);
$format = formatBytes($size);
function getDirectorySize($dir) {
  $bytestotal = 0;
  $path = realpath($dir);
  if (file_exists($path)) {
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object) {
      $bytestotal += $object->getSize();
    }
  }
  return $bytestotal;
}
function formatBytes($size, $precision = 2) {
  $base = log($size, 1024);
  $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');

  return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
}
header("Content-Type: application/json; charset=utf-8");
header("Cloudflare-CDN-Cache-Control: max-age=600");
echo "{\"file\":$files,\"sizebytes\":$size,\"size\":\"$format\"}";
exit();