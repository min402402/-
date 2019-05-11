<?php   include "data.php"; ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>회원가입 및 로그인 사이트</title>
</head>
<body>
<div id="login_box">
    <center><h1>로그인</h1></center>
    <form method="post" action="login_ok.php">
        <table align="center" border="0" cellspacing="0" width="300">
            <tr>
                <td width="130" colspan="1">
                    <input type="text" name="userid" class="inph">
                </td>
                <td rowspan="2" align="center" width="100" >
                    <button type="submit" id="btn" >로그인</button>
                </td>
            </tr>
            <tr>
                <td width="130" colspan="1">
                    <input type="password" name="userpw" class="inph">
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center" class="mem">
                    <a href="drsignUp.php">기사로 가입하시나요?</a><br>
                    <a href="gusignUp.php">손님으로 가입하시나요?</a>
                </td>

            </tr>
        </table>
    </form>
</div>
</body>
</html>