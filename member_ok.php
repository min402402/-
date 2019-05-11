<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
include "data.php";

$userid = $_POST['userid'];
$userpw = $_POST['userpw'];
$username = $_POST['name'];
$drnum = $_POST['drnum'];
$carnum = $_POST['carnum'];
$phnum = $_POST['phnum'];


if($pdo) {
    $sql = $pdo->prepare("INSERT INTO driver (id,pw,name,drnum,carnum,phnum) VALUES (:userid, :userpw, :username, :drnum, :carnum, :phnum)");
    $sql->bindParam(':userid', $userid);
    $sql->bindParam(':userpw', $userpw);
    $sql->bindParam(':username', $username);
    $sql->bindParam(':drnum', $drnum);
    $sql->bindParam(':carnum', $carnum);
    $sql->bindParam(':phnum', $phnum);
    $result = $sql->execute();
}
else{
    echo "fail";
}
?>

<script type="text/javascript">alert('회원가입이 완료되었습니다.');
    document.location.href="login.php";
</script>

<!--<meta http-equiv="refresh" content="0 url=/">-->
</body>
</html>


