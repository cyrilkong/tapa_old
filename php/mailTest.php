<?php

$to = 'cyril.kong@gmail.com';

$subject = 'Website Change Reqest';

$headers = "From: " . strip_tags('admin@twopatch.com') . "\r\n";
$headers .= "Reply-To: ". strip_tags('admin@twopatch.com') . "\r\n";
$headers .= "CC: lawrence.csy@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
/*
$message = '<html><body>';
$message .= '<h1>Hello, World! Hope you guys can see this. DO NOT REPLY.</h1>';
$message .= '<h4>Cheers,</h4>';
$message .= '<h3>Lawrence</h3>';
$message .= '</body></html>';
*/

$message = '<html><body><h4>An Unordered List:</h4><ul><li>Coffee</li><li>Tea</li><li>Milk</li></ul>';
$message .= '<table border="1" style="background-color:#FFFCCC">';
$message .= '<tr><td style="background-color:red">row 1, cell 1</td><td>row 1, cell 2</td></tr>';
$message .= '<tr><td><img border="0" src="http://twopatch.com/images/demo/m_logos.png" alt="Pulpit rock" width="304" height="228" /></td><td>row 2, cell 2</td></tr>';
$message .= '</table>';
$message .= '<dl><dt>Coffee</dt><dd>- black hot drink</dd><dt>Milk</dt><dd>- <a href="http://twopatch.com">tapa!</a></dd></dl>';
$message .= '</body></html>';



mail($to, $subject, $message, $headers);
?>