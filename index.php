<?php
include_once("php_includes/check_login_status.php");
$sql = "SELECT username, avatar FROM users WHERE avatar IS NOT NULL AND activated='1' ORDER BY RAND() LIMIT 32";
$query = mysqli_query($db_conx, $sql);
$userlist = "";
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	$u = $row["username"];
	$avatar = $row["avatar"];
	$profile_pic = 'user/'.$u.'/'.$avatar;
	$userlist .= '<a href="user.php?u='.$u.'" title="'.$u.'"><img src="'.$profile_pic.'" alt="'.$u.'" style="width:100px; height:100px; margin:10px;"></a>';
}
$sql = "SELECT COUNT(id) FROM users WHERE activated='1'";
$query = mysqli_query($db_conx, $sql);
$row = mysqli_fetch_row($query);
$usercount = $row[0];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>You Central</title>
<link rel="shortcut icon" href="favicon.png" type="image/x-icon">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include_once("template_pageTop.php"); ?>
<div id="pageMiddle">
<div class='header'><h1>Home</h1></div>
<div class='search-view'>
<input class='search-key' type="text"/>
<ul class='employee-list'></ul>
</div>

<script src="lib/jquery-1.8.2.min.js"></script>
<script src="js/storage/memory-store.js"></script>
<script src="js/main.js"></script>
<script src="js/storage/ls-store.js"></script>
<script src="js/storage/websql-store.js"></script>
</div>
<?php include_once("template_pageBottom.php"); ?>
</body>
</html>
