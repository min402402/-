<?php $a = $_POST['pay']; ?>

<html>
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
    <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
</head>
<body>


<script>

    var IMP = window.IMP; // 생략가능

    IMP.init('imp88648066'); // 'iamport' 대신 부여받은 "가맹점 식별코드"를 사용

    IMP.request_pay({
    pg : 'kakaopay', // version 1.1.0부터 지원.
    pay_method : 'card',
    merchant_uid : 'merchant_' + new Date().getTime(),
    name : '주문명: 예약자 김성희',
    amount : '<?php echo $a; ?>',
    buyer_email : 'iamport@siot.do',
    buyer_name : '김성희',
    buyer_tel : '010-8436-2043',
    buyer_addr : '익산시',
    buyer_postcode : '123-456',
    m_redirect_url : '../jh/dv_complete.php'

}, function(rsp) {
    if ( rsp.success ) {
        var msg = '결제가 완료되었습니다.';
        msg += '고유ID : ' + rsp.imp_uid;
        msg += '상점 거래ID : ' + rsp.merchant_uid;
        msg += '결제 금액 : ' + rsp.paid_amount;
        msg += '카드 승인번호 : ' + rsp.apply_num;

        window.location.href = '../jh/dv_complete.php';
    } else {
        var msg = '결제에 실패하였습니다.';
        msg += '에러내용 : ' + rsp.error_msg;
    }
    alert(msg);
});
</script>
</body>
</html>
