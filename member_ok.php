<?php
include "data.php";

$userid = $_POST['userid'];
$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
$username = $_POST['name'];
$drnum = $_POST['drnum'];
$carnum = $_POST['carnum'];


if($pdo) {
    $sql = $pdo->prepare("INSERT INTO driver (id,pw,name,drnum,carnum) VALUES (:userid, :userpw, :username, :drnum, :carnum)");
    $sql->bindParam(':userid', $userid);
    $sql->bindParam(':userpw', $userpw);
    $sql->bindParam(':username', $username);
    $sql->bindParam(':drnum', $drnum);
    $sql->bindParam(':carnum', $carnum);
    $result = $sql->execute();
}
?>
<meta charset="utf-8" />
<script type="text/javascript">alert('회원가입이 완료되었습니다.');</script>
<meta http-equiv="refresh" content="0 url=/">