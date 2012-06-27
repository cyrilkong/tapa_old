<?php

$recipientChi = $_POST['recipientChi'];
$recipientEng = $_POST['recipientEng'];
$contentChi = $_POST['contentChi'];
$contentEng = $_POST['contentEng'];
$ccEmail = $_POST['ccEmail'];//'lawrence.csy@gmail.com';
$toEmail = $_POST['toEmail'];//'lawrence.csy@gmail.com';
$subject = $_POST['subject'];//'[MERCHANT NAME] 至潮的流動會員獎賞計劃 [MERCHANT NAME] Mobile Loyalty Program';
$subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";
$fromEmail = $_POST['fromEmail'];
$to = $toEmail;


function isValidEmail($email){
	if(isset($email)){
		$email = htmlspecialchars(stripslashes(strip_tags($email))); 
		if(eregi('[a-z||0-9]@[a-z||0-9].[a-z]', $email)) { 
			$domain = explode( "@", $email );
			if (@fsockopen ($domain[1],80,$errno,$errstr,3)) { 
				return true;
			} else { 
				return false; 
			} 
		} else { 
			return false; 
		} 
		if(isset($email) && (preg_match("/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/", $email) > 0)){
			return true;
		}
	}
	return false;
}
	
if(!empty($recipientChi) && !empty($recipientEng) && !empty($contentChi) && !empty($contentEng) && 
	isValidEmail($ccEmail) && isValidEmail($toEmail) && !empty($subject) && isValidEmail($fromEmail)){
	
	$headers = "From: " . strip_tags($fromEmail) . "\r\n";
	$headers .= "Reply-To: ". strip_tags("info@twopatch.com") . "\r\n";
	$headers .= "CC: " . strip_tags($ccEmail) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	
    $message = '
<div bgcolor="#f2f2f2" style="margin:0;padding:0">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td style="padding:10px;background-color:#f2f2f2"><font face="Helvetica Neue, Helvetica, Microsoft JhengHei, Arial, Sans-Serif" weight="300">
<table width="700" border="0" cellspacing="0" cellpadding="0" align="center" style="margin:0">
<tbody>
<tr>
<td colspan="5" valign="top"><font color="#222" face="Helvetica Neue, Helvetica, Microsoft JhengHei, Arial, Sans-Serif">
<p style="line-height:18px">'
. $recipientChi . //致 [MERCHANTS NAME]:
'</p>
<p style="line-height:18px">'
. $contentChi .//透過我們輕鬆簡單建立“ [MERCHANTS NAME] 的流動會員獎賞計劃”，有效提升銷售及吸引新顧客，緊貼你的顧客，無須安裝硬件及印刷會員卡，減低製作成本之餘，更可讓你的顧客隨時隨地利用手機查閱積分/儲積分換領獎賞，方便易用!
'</p>
<p style="line-height:18px">
2月28日前登記，頭50間參與商戶即享 <a href="http://www.twopatch.com" target="_blank" style="text-decoration:underline">免費使用</a>，名額有限、火速登記!
</p></font>
<br />
</td>
</tr>
<tr>
<td colspan="5" valign="top"><font color="#222" face="Helvetica Neue, Helvetica, Microsoft JhengHei, Arial, Sans-Serif">
<p style="line-height:18px">'
. $recipientEng .//Dear [MERCHANTS NAME]:    
'</p>
<p style="line-height:18px">'
. $contentEng .//We make it easy for you to create a mobile loyalty program that rewards your loyal customers and attract new ones. We believe [MERCHANTS NAME] can benefit across its stores in Hong Kong from our product and customer base.
'</p>
<p style="line-height:18px">
Grow your business with us today. <a href="http://www.twopatch.com" target="_blank" style="text-decoration:underline">Join for free</a> before 28 February – limited to the first 50 merchants.
</p></font>
<br>
</td>
</tr>
<tr>
<td colspan="5" height="20"></td>
</tr>
<tr>
<td colspan="5" bgcolor="#fff" bordercolor="#e1e1e1" style="border-width:1px;border-style:solid;position:relative;padding:10px 0;">
<table width="700" border="0" cellspacing="0" cellpadding="0" align="center" style="margin:0">
<tbody>
<tr>
<td colspan="3">
<font color="#222" face="Helvetica Neue, Helvetica, Microsoft JhengHei, Arial, Sans-Serif">
<p align="center" style="line-height:18px;color:#000;text-shadow:0 -1px 0 #fff">
建立簡單
<br />
不用10分鐘，無需安裝系統，即可完成建立您的印花獎賞計劃
</p>
 </font>
</td>
<td colspan="2" valign="middle">
<a target="_blank" href="http://www.twopatch.com" style="cursor:pointer;width: 170px;margin: 0 auto;text-decoration:none;border: 1px solid gainsboro;background: #0071aa;display: block;border-radius: 5px;"><span style="padding: 10px 20px;line-height: 20px;color: #fff;text-shadow: 0 -1px 1px #003a60;text-align: center;display:block;font-size:15px">想知更多？
</span></a>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td colspan="5" height="20"></td>
</tr>
<tr>
<td width="200"><img alt="流動會員獎賞計劃 TAPA App" src="http://www.twopatch.com/letter/img/phone.png" width="200" height="113" alt="" vspace="16" border="0" style="border:none"></td>
<td width="40"></td>
<td width="200"><img alt="有效提升生意銷售 Grow Your Business" src="http://www.twopatch.com/letter/img/grow.png" width="200" height="113" alt="" vspace="16" border="0" style="border:none"></td>
<td width="40"></td>
<td width="200"><img alt="數據統計及分析 Customer Analytics" src="http://www.twopatch.com/letter/img/chart.png" width="200" height="113" alt="" vspace="16" border="0" style="border:none"></td>
</tr>
<tr>
<td valign="top">
<font face="Helvetica Neue, Helvetica, Microsoft JhengHei, Arial, Sans-Serif"><p style="display:block;border-bottom:1px solid #cccccc;font-weight:700">
	<span style="font-weight:500;margin-right:5px;display:inline-block;background:#0072b1;border-radius:100px;line-height:14px;width:14px;height:14px;color:#fff;text-align:center;">&nbsp;</span><font color="#00476B" face="Helvetica Neue, Helvetica, Microsoft JhengHei, Arial, Sans-Serif">流動會員獎賞計劃</font>
	</p>
	<p style="font-weight:300;">
	不用10分鐘，即可完成建立您的流動會員獎賞計劃
	</p>
	<p style="font-weight:300;">
	根據顧客的購買行為偏好、顧客數字統計或地區分佈分析來發佈針對性的獎賞優惠吸引您的目標顧客群
	</p></font></td>
<td width="40"></td>
<td valign="top">
<font face="Helvetica Neue, Helvetica, Microsoft JhengHei, Arial, Sans-Serif"><p style="display:block;border-bottom:1px solid #cccccc;font-weight:700">
	<span style="font-weight:500;margin-right:5px;display:inline-block;background:#0072b1;border-radius:100px;line-height:14px;width:14px;height:14px;color:#fff;text-align:center;">&nbsp;</span><font color="#00476B" face="Helvetica Neue, Helvetica, Microsoft JhengHei, Arial, Sans-Serif">有效提升生意銷售</font>
	</p>
	<p style="font-weight:300;">
	TAPA協助您輕易建立一個會員獎賞計劃、推動您的業務、留住顧客。獎賞您的忠誠顧客、贏取更多新客
	</p>
	<p style="font-weight:300;">
	提供每個顧客的參與數據、每次消費模式分析、促銷成效數據
	</p></font></td>
<td width="40"></td>
<td valign="top">
<font face="Helvetica Neue, Helvetica, Microsoft JhengHei, Arial, Sans-Serif"><p style="display:block;border-bottom:1px solid #cccccc;font-weight:700">
	<span style="font-weight:500;margin-right:5px;display:inline-block;background:#0072b1;border-radius:100px;line-height:14px;width:14px;height:14px;color:#fff;text-align:center;">&nbsp;</span><font color="#00476B">流動市場推廣</font>
	</p>
	<p style="font-weight:300;">
	直接透過手機聯繫過千顧客
	</p>
	<p style="font-weight:300;">
	TAPA帶給你一個至潮至新穎的流動會員獎賞計劃，你可以清楚了解誰是您的VIP顧客、他們的喜好及何時來購物... 等資料
	</p></font></td>
</tr>
<tr>
<td colspan="5" height="20"></td>
</tr>

<tr>
<td colspan="5" height="40"></td>
</tr>
<tr>
<td colspan="5" bgcolor="#fff" bordercolor="#e1e1e1" style="border-width:1px;border-style:solid;position:relative;padding:10px 0;">
<table width="700" border="0" cellspacing="0" cellpadding="0" align="center" style="margin:0">
<tbody>
<tr>
<td colspan="3">
<font color="#222">
<p align="center" style="line-height:18px;color:#000;text-shadow:0 -1px 0 #fff">
Easy Setup
<br />
Setup in less than 10 minutes, no hardware required
</p> </font>
</td>
<td colspan="2" valign="middle">
<a target="_blank" href="http://www.twopatch.com" style="cursor:pointer;width: 170px;margin: 0 auto;text-decoration:none;border: 1px solid gainsboro;background: #0071aa;display: block;border-radius: 5px;"><span style="padding: 10px 20px;line-height: 20px;color: #fff;text-shadow: 0 -1px 1px #003a60;text-align: center;display:block;font-size:15px">
Learn More</span></a>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td colspan="5" height="40"></td>
</tr>
<tr>
<td valign="top">
<font face="Helvetica Neue, Helvetica, Microsoft JhengHei, Arial, Sans-Serif"><p style="display:block;border-bottom:1px solid #cccccc;font-weight:500">
	<span style="margin-right:5px;display:inline-block;background:#0072b1;border-radius:100px;line-height:14px;width:14px;height:14px;color:#fff;text-align:center;">&nbsp;</span><font color="#00476B">Mobile Loyalty Program</font>
	</p>
	<p style="font-weight:300;">
	Create a mobile loyalty program in 10 minutes.
	</p>
	<p style="font-weight:300;">
	Send targeted offers by based on customer purchase behaviour, demographic or geo-location.
	</p></font></td>
<td width="40"></td>
<td valign="top">
<font face="Helvetica Neue, Helvetica, Microsoft JhengHei, Arial, Sans-Serif"><p style="display:block;border-bottom:1px solid #cccccc;font-weight:500">
	<span style="margin-right:5px;display:inline-block;background:#0072b1;border-radius:100px;line-height:14px;width:14px;height:14px;color:#fff;text-align:center;">&nbsp;</span><font color="#00476B">Grow your business</font>
	</p>
	<p style="font-weight:300;">
	Tapa makes it easy for you to create a loyalty program that brings customers back for more. Reward your most loyal customers and gain new ones.
	</p>
	<p style="font-weight:300;">
	See total visits per individual customer and individual purchase behaviour.
	</p>
	</font></td>
<td width="40"></td>
<td valign="40">
<font face="Helvetica Neue, Helvetica, Microsoft JhengHei, Arial, Sans-Serif"><p style="display:block;border-bottom:1px solid #cccccc;font-weight:500">
	<span style="margin-right:5px;display:inline-block;background:#0072b1;border-radius:100px;line-height:14px;width:14px;height:14px;color:#fff;text-align:center;">&nbsp;</span><font color="#00476B">Mobile Marketing</font>
	</p>
	<p style="font-weight:300;">
	Connect with thousands of customers directly via mobile.
	</p>
	<p style="font-weight:300;">
	TAPA gives you metrics on your loyalty program so you know your who VIP customers are, what they like and when they come.
	</p>
	</font></td>
</tr>
<tr>
<td colspan="5" height="20"></td>
</tr>
<tr>
<td colspan="5" height="40"></td>
</tr>
<tr>
<td colspan="5" valign="top"><font color="#222" face="Helvetica Neue, Helvetica, Microsoft JhengHei, Arial, Sans-Serif">
<p style="line-height:18px">
2月份推廣優惠
<br />
2月28日前登記，頭50間參與商戶即享 <a href="http://www.twopatch.com" target="_blank" style="text-decoration:underline">免費使用</a>，名額有限、火速登記!
</p>
</font>
</td>
</tr>
<tr>
<td colspan="5" height="20"></td>
</tr>
<tr>
<td colspan="5" valign="top"><font color="#222" face="Helvetica Neue, Helvetica, Microsoft JhengHei, Arial, Sans-Serif">
<p style="line-height:18px">
February promotion
<br />
<a href="http://www.twopatch.com" target="_blank" style="text-decoration:underline">Join us</a> in February for free
</p>
</font>
</td>
</tr>
<tr>
<td colspan="5" height="20"></td>
</tr>
<tr>
<td colspan="5" valign="top"><font color="#222" face="Helvetica Neue, Helvetica, Microsoft JhengHei, Arial, Sans-Serif">
<p style="line-height:18px">
想了解更多，請瀏覽 <a href="http://www.twopatch.com" target="_blank">www.twopatch.com</a>
<br />
請電郵至 <a href="mailto:info@twopatch.com">info@twopatch.com</a>，或致電客服熱線： +852 5414 0977
</p>
<p style="line-height:18px">
Learn more at: <a href="http://www.twopatch.com" target="_blank">www.twopatch.com</a>
<br />
Contact us: +852 5414 0977 or <a href="mailto:info@twopatch.com">info@twopatch.com</a>
</p></font>
</td>
</tr>
</tbody>
</table></font></td></tr></tbody></table></div>';
    
	
	
	if(mail($to, $subject, $message, $headers)){
		$output['success'] = 1;
	}else{
		$output['success'] = 0;
	}
}else{
	$output['success'] = 2;
}
echo json_encode($output);
?>