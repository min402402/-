<?php
header('Content-Type: text/html; charset=utf-8');
$id=$_POST['id'];
$pw=$_POST['pw'];
$pwc=$_POST['pwc'];
$name=$_POST['name'];
$gender=$_POST['gender'];

if($pw!=$pwc)
{
    echo "비밀번호와 비밀번호 확인이 서로 다릅니다.";
    echo "<a href=btsignUp.html>back page</a>";
    exit();
}
if($id==NULL||$pw==NULL||$name==NULL||$gender==NULL)
{
    echo "비밀번호와 비밀번호 확인이 서로 다릅니다.";
    echo "<a href=btsignUp.html>back page</a>";
    exit();
}
if($id==NULL||$pw==NULL||$name==NULL||$gender==NULL)
{
    echo "빈 칸을 모두 채워주세요";
    echo "<a href=btsignUp.html>back page</a>";
    exit();
}
try {
    $pdo = new PDO("mysql:" . "host=localhost;" . "dbname=bulletaxi", 'bulletaxi', 'bulletaxi123', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "회원가입 완료<br/>";
    if($pdo)
    {
        $sql = $pdo->prepare("INSERT INTO test (test1, test2) VALUES (:test1, :test2)");
        $sql->bindParam(':test1', $test1);
        $sql->bindParam(':test2', $test2);
        $result = $sql->execute();

        $test = $pdo->prepare("SELECT * FROM test");
        $test->execute();
        $test->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $test->fetch()){
            echo $row['test1'].'&nbsp';
            echo $row['test2'].'<br/>';
        }
    }
    else{
        echo "fail";
    }
    $pdo = null;
}
catch(Exception $e){
    echo $e->getMessage(); //에러 출력
}


?>