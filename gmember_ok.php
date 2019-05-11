<?php
include "data.php";

$userid = $_POST['userid'];
$userpw = $_POST['userpw'];
$username = $_POST['name'];
$phnum = $_POST['phnum'];
$sex = $_POST['sex'];


if($pdo) {
    $sql = $pdo->prepare("INSERT INTO driver (id,pw,name,drnum,carnum) VALUES (:userid, :userpw, :username, :drnum, :carnum)");
    $sql->bindParam(':userid', $userid);
    $sql->bindParam(':userpw', $userpw);
    $sql->bindParam(':username', $username);
    $sql->bindParam(':phnum', $phnum);
    $sql->bindParam(':sex', $sex);
    $result = $sql->execute();
}
?>
<meta charset="utf-8" />
<script type="text/javascript">alert('회원가입이 완료되었습니다.');</script>
<meta http-equiv="refresh" content="0 url=/">