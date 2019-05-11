<meta charset="utf-8" />
<?php
include "data.php";

//POST로 받아온 id와 비밀번호가 비었다면 알림창을 띄우고 전 페이지로 돌아갑니다.
if($_POST["userid"] == "" || $_POST["userpw"] == ""){
    echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
}else{

    //password변수에 POST로 받아온 값을 저장하고 sql문으로 POST로 받아온 아이디값을 찾습니다.
    $password = $_POST['userpw'];
    $id=$_POST["userid"];
    $sql = $pdo->prepare("SELECT id,pw FROM driver WHERE id =:id");
    $sql->bindParam(':id', $id);
    $sql->execute();

    $driver = $sql->fetch(PDO::FETCH_ASSOC);
    $dsave_pw = $driver['pw'];
    $dsave_id = $driver['id'];

    $sql = $pdo->prepare("SELECT id,pw FROM guest WHERE id =:id");
    $sql->bindParam(':id', $id);
    $sql->execute();

    $guest = $sql->fetch(PDO::FETCH_ASSOC);
    $gsave_pw = $guest['pw'];
    $gsave_id = $guest['id'];

    //echo $dsave_id;


    if(($dsave_pw==$password)&&($dsave_id==$id))
    {
        $_SESSION['userid'] = $driver["id"];
        $_SESSION['userpw'] = $driver["pw"];

        echo "<script>alert('로그인되었습니다.'); location.href='select.html';</script>";
    }
    elseif(($gsave_pw==$password)&&($gsave_id==$id))
    {
        $_SESSION['userid'] = $guest["id"];
        $_SESSION['userpw'] = $guest["pw"];

        echo "<script>alert('로그인되었습니다.'); location.href='select.html';</script>";
    }
    else{ // 비밀번호가 같지 않다면 알림창을 띄우고 전 페이지로 돌아갑니다
        echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
        }
}
?>