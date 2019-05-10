<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
$receive_key = $_POST['key'];
try {
    $pdo = new PDO("mysql:" . "host=localhost;" . "dbname=bulletaxi", 'bulletaxi', 'bulletaxi123', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($pdo)
    {
        $test = $pdo->prepare("SELECT * FROM reservation");
        $test->execute();
        $test->setFetchMode(PDO::FETCH_ASSOC);

        $data = array();

        while($row = $test->fetch(PDO::FETCH_ASSOC)){
            array_push($data,
                array('starting_point'=>$row['starting_point'],
                    'destination'=>$row['destination'],
                    'time'=>$row['time'],
                    'people'=>$row['people'],
                    'person'=>$row['person']
                ));
        }

        $length = sizeof($data);
        //echo $length;

        foreach ($data as $key => $value)
        {
            foreach ($value as $title => $content){
                //echo $key." / ".$keys."/".$values."<br/>";

                    if($key == $receive_key)
                    {
                        if($title == "starting_point")
                        {?>
                            출발지 : <?php
                            echo $content;
                            echo "<br>\n";
                        }
                        if($title == "destination")
                        {?>
                            도착지 : <?php
                            echo $content;
                            echo "<br>\n";
                        }
                        if($title == "time")
                        {?>
                            시간 : <?php
                            echo $content;
                            echo "<br>\n";
                        }
                        if($title == "people")
                        {?>
                            인원 : <?php
                            echo $content;
                            echo "<br>\n";
                        }
                        if($title == "person")
                        {?>
                            현재 예약한 인원 : <?php
                            echo $content;
                            echo "<br>\n";
                        }
                    }
            }
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
</body>
</html>
