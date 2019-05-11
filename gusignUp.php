<?php include "data.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>회원가입 폼</title>
    <script>
        function checkid(){
            var userid = document.getElementById("uid").value;
            if(userid)
            {
                url = "check.php?userid="+userid;
                window.open(url,"chkid","width=300,height=100");
            }else{
                alert("아이디를 입력하세요");
            }
        }
    </script>
</head>
<body>
<form method="post" action="gmember_ok.php" name="gmemform">
    <h1>회원가입 폼</h1>
    <fieldset>
        <legend>입력사항</legend>
        <table>
            <tr>
                <td>아이디</td>
                <td><input type="text" size="35" name="userid" id="uid" placeholder="아이디" required>
                    <input type="button" value="중복검사" onclick="checkid();" />
                    <input type="hidden" value="0" name="chs" />
                </td>
            </tr>
            <tr>
                <td>비밀번호</td>
                <td><input type="password" size="35" name="userpw" placeholder="비밀번호" required></td>
            </tr>
            <tr>
                <td>이름</td>
                <td><input type="text" size="35" name="name" placeholder="이름" required></td>
            </tr>
            <tr>
                <td>핸드폰번호</td>
                <td><input type="text" size="35" name="phnum" placeholder="핸드폰번호" required></td>
            </tr>
            <tr>
                <td>성별</td>
                <td>남<input type="radio" name="sex" value="남"> 여<input type="radio" name="sex" value="여"></td>
            </tr>
        </table>
        <input type="submit" value="가입하기" /><input type="reset" value="다시쓰기" />
    </fieldset>
</form>
</body>
</html>