<?php
session_start();
if(!isset($_SESSION['userid']))
{
    header('Location: ./login.html');
}

echo "로그인o";

echo "<a href=logout.php>로그아웃</a>";

?>