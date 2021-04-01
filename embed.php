<?php
$host = $_SERVER["SERVER_NAME"];
$query = $_SERVER["QUERY_STRING"];
$link = "https://" . $host . "/up/" . $query;
?>
<!DOCTYPE html><html style="height:100%"><head><meta name="viewport" content="width=device-width,minimum-scale=0.1"><meta name="twitter:card" content="summary_large_image"><meta property="og:description" content="[original](<?php echo $link;?>)"><meta property="twitter:image" content="<?php echo $link;?>"><meta name="theme-color" content="#B648B6"><link type="application/json+oembed" href="https://<?php echo $host;?>/embed.json"></head><body style="margin: 0px;background: #0e0e0e;display:flex;justify-content:center;height:100%"><img style="-webkit-user-select:none;margin:auto" src="<?php echo $link;?>"></body></html>
