<?php

require_once('./TCPDF/tcpdf_import.php');
$color1=$_POST['color1'];
$color2=$_POST['color2'];
$color3=$_POST['color3'];
$color4=$_POST['color4'];
$color5=$_POST['color5'];
$color6=$_POST['color6'];
$color7=$_POST['color7'];
$color8=$_POST['color8'];
$color9=$_POST['color9'];
$color10=$_POST['color10'];
$color11=$_POST['color11'];
$color12=$_POST['color12'];
$email= $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$sum=0;
$sum=300*($color1+$color2+$color3+$color4+$color5+$color6+$color7+$color8+$color9+$color10+$color11+$color12);

include 'phpqrcode.php';
QRcode::png('http://140.138.152.215/~s1091448/HW2/','qrcode/1.png');

/*---------------- Sent Mail Start -----------------*/

mb_internal_encoding("utf-8");
$to=$email;
$subject=mb_encode_mimeheader("Shopping List","utf-8");

$message="
<p>姓氏：$firstname</p>
<p>名字:$lastname</p>
<p>電話：$phone</p>
<p>電子信箱：$email</p>
<p>地址：$address </p>
";
$headers="MIME-Version: 1.0\r\n";
$headers.="Content-type: text/html; charset=utf-8\r\n";
$headers.="From:".mb_encode_mimeheader("Shopping List","utf-8")."<s1091448@mail.yzu.edu.tw>\r\n";
//$mail($to, $subject, $message, $headers);



/*---------------- Sent Mail End -------------------*/


/*---------------- Print PDF Start -----------------*/
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('cid0jp','', 18); 
$pdf->AddPage();

$html = <<<EOF
<table border="1" cellspacing="3" cellpadding="4">
<tr> 
  <td>姓氏</td>
	<td>$firstname</td>
	<td>名字</td>
	<td>$lastname</td>
</tr>
<tr>
  <td>電話</td>
	<td>$phone</td>
	<td>信箱</td>
	<td>$email</td>
</tr>
<tr>
  <td>地址</td>
	<td colspan = "3"><p style="color:red; background-color:yellow;">$address</p></td>
</tr>
<tr>
	<td>總金額</td>
	<td>$sum</td>
</tr>
<br/>
<img src="qrcode/1.png">

</table>
EOF;
/*---------------- Print PDF End -------------------*/

$pdf->writeHTML($html);
$pdf->lastPage();
$pdf->Output('./PDF/'.$firstname.'.pdf', 'I');