<meta charset="utf-8" />
<?php
include "data.php";
$uid = $_GET["userid"];

$sql = $pdo->prepare("SELECT id FROM driver WHERE id='$uid'");
$sql->execute();
$driver = $sql->fetch(PDO::FETCH_ASSOC);

$sql = $pdo->prepare("SELECT id FROM guest WHERE id='$uid'");
$sql->execute();
$guest = $sql->fetch(PDO::FETCH_ASSOC);

if($driver==null&&$guest==null)
{
    ?>
    <div><?php echo $uid; ?>는 사용가능한 아이디입니다.</div>
    <?php
}else{
?>
<div><?php echo $uid; ?>중복된아이디입니다.<div>
        <?php
        }
        ?>
        <button value="닫기" onclick="window.close()">닫기</button>
        <script>
        </script>