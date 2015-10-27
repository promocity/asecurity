<?php
	function escape_chars($strinput){
		if(is_array($strinput))
			return "";
		if(!empty($strinput) && is_string($strinput)) {
			$strinput = str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a",'<','>'), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z','&gt;','&lt;'), $strinput);
			return htmlspecialchars(trim($strinput));
		}
	}
	function getbool($boolstr){
		$boolstr = filter_var($boolstr, FILTER_VALIDATE_BOOLEAN);
		return $boolstr;
	}
	$order_person_name = escape_chars($_POST['order_person_name']);
	$order_person_tel = escape_chars($_POST['order_person_tel']);
	if ($order_person_name == '') {
		$errormessage = '����������, ������� ���� ���.';
	} else {
		if ($order_person_tel == ''){
			$errormessage = '����������, ������� ����� ��������.';
		}
	}
	if ($order_person_name != '' && $order_person_tel != ''){
		$signaling = getbool($_POST['signaling']);
		$alarm_button = getbool($_POST['alarm_button']);
		$gas = getbool($_POST['gas']);
		$fire = getbool($_POST['fire']);
		$water = getbool($_POST['water']);
		$service = getbool($_POST['service']);
		$night = getbool($_POST['night']);
		$online_control = getbool($_POST['online_control']);
		
		$price = escape_chars($_POST['price']);
		$price_month = escape_chars($_POST['price_month']);
		
		$mail_message = '��������� ������ �� '.$order_person_name.' (���������� �������: '.$order_person_tel.') �� ��������� ������ ���������� '.$price.': '."\n";
		if ($signaling == true) 
			$mail_message .= "������������\n";
		if ($alarm_button == true)
			$mail_message .= "��������� ������\n";
		if ($gas == true)
			$mail_message .= "���������� �� ������ ����\n";
		if ($fire == true)
			$mail_message .= "���������� � ����������\n";
		if ($water == true)
			$mail_message .= "���������� � ����������\n";
		if ($service == true)
			$mail_message .= "��������� ������������\n";
		if ($night == true)
			$mail_message .= "������ �����\n";
		if ($online_control == true)
			$mail_message .= "������ ��������\n";
		
		mail('packeger@yandex.ru', '������ ������ �����������', $mail_message);
		$errormessage = "������ ������� ����������.";
	}
	echo $errormessage;
?>