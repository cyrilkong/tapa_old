<?php
	if($_GET['pwd'] != 'thisisfortapamarketingonly'){
		exit();
	}
?>

<!DOCTYPE HTML>
<html lang="en-US" class="no-js">
	<head>
		<meta charset="UTF-8">
		<title>TAPA</title>
		<meta name="description" content="">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<script type="text/javascript" src="../scripts/libs/jquery-1.7.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$('#sendBtn').click(function(){
					var toEmail = $('#toEmail').val();
					var fromEmail = $('#fromEmail').val();
					var ccEmail = $('#ccEmail').val();
					var subject = $('#subject').val();
					var recipientChi = $('#recipientChi').val();
					var recipientEng = $('#recipientEng').val();
					var contentChi = $('#contentChi').val();
					var contentEng = $('#contentEng').val();
					console.log(toEmail);
					console.log(fromEmail);
					console.log(ccEmail);
					console.log(subject);
					console.log(recipientChi);
					console.log(recipientEng);
					console.log(contentChi);
					console.log(contentEng);
					
					if(toEmail != '' && fromEmail != '' && ccEmail != '' && subject != '' 
						&& recipientChi != '' && recipientEng != '' && contentChi != '' && contentEng != ''){
						$.ajax({
							url: "../php/mail_template.php",         
							type: "POST",
							data: {
								toEmail:toEmail,
								fromEmail:fromEmail,
								ccEmail:ccEmail,
								subject:subject,
								recipientChi:recipientChi,
								recipientEng:recipientEng,
								contentChi:contentChi,
								contentEng:contentEng
							},
							dataType: "json",
							success: function(data){
								if(data['success'] == 1){
									alert('email sent!');
								}else{
									alert('fail to send!');
								}
								console.log(data);
							}
						});
					
					}
				
				});			
			});

		</script>
	</head>
	<body>
		<div class="signup_form">
				<div class="form_contn">
					<p>
						Please fill out all information before send. Feel Free to edit the variable [MERCHANT NAME] inside input fields.
					</p>
					<div>
						<input type="email" maxlength="64" style="width:300px;" placeholder="Enter Recipient's Email Address" id="toEmail" /> Ref: someone@merchant.com
					</div>
					<div>
						<input type="email" maxlength="64" style="width:300px;" placeholder="Enter Sender's Email Address, e.g. admin@twopatch.com" id="fromEmail" /> Ref: admin@twopatch.com
					</div>
					<div>
						<input type="email" maxlength="64" style="width:300px;" placeholder="Enter cc email Address(es), e.g. admin@twopatch.com" id="ccEmail" /> Ref: info@twopatch.com
					</div>
					<div>
						<input type="text" maxlength="256" style="width:800px;" placeholder="Subject" id="subject"   /><br>
						Ref: [MERCHANT NAME] 至潮的流動會員獎賞計劃 [MERCHANT NAME] Mobile Loyalty Program.
					</div>
					<div>
						<input type="text" maxlength="128" style="width:300px;" placeholder="Greeting (chi)" id="recipientChi"   /><br>
						Ref: 致 [MERCHANTS NAME]:
					</div>
					<div>						
						<input type="text" maxlength="128" style="width:300px;" placeholder="Greeting (eng)" id="recipientEng"   /><br>
						Ref: Dear [MERCHANTS NAME]:
					</div>
					<div>								
						<textarea rows="15" cols="80" id="contentChi">透過我們輕鬆簡單建立“ [MERCHANTS NAME] 的流動會員獎賞計劃”，有效提升銷售及吸引新顧客，緊貼你的顧客，無須安裝硬件及印刷會員卡，減低製作成本之餘，更可讓你的顧客隨時隨地利用手機查閱積分/儲積分換領獎賞，方便易用!</textarea>
					</div>
					<div>					
						<textarea rows="15" cols="80" id="contentEng">We make it easy for you to create a mobile loyalty program that rewards your loyal customers and attract new ones. We believe [MERCHANTS NAME] can benefit across its stores in Hong Kong from our product and customer base.</textarea>
					</div>
					<button id="sendBtn">Send Email</button>
				</div>
		</div>
	</body>
</html>