<?php
$starting_point = "전주 덕진광장";
$destination = "군산";
$time = "1300-1330";
$people = 4;
$name = "김지똥";
$phone = "010-1234-5902";
$person = 1;
try {
    $pdo = new PDO("mysql:" . "host=localhost;" . "dbname=bulletaxi", 'bulletaxi', 'bulletaxi123', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($pdo)
    {
        $sql = $pdo->prepare("INSERT INTO reservation (starting_point, destination, time, people, name, phone, person) VALUES (:starting_point, :destination, :time, :people, :name, :phone, :person)");
        $sql->bindParam(':starting_point', $starting_point);
        $sql->bindParam(':destination', $destination);
        $sql->bindParam(':time', $time);
        $sql->bindParam(':people', $people);
        $sql->bindParam(':name', $name);
        $sql->bindParam(':phone', $phone);
        $sql->bindParam(':person', $person);
        $result = $sql->execute();
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