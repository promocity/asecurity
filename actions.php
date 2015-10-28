<?php
	/*	escape_chars	������� ������ �� �������� ����
	 *  getbool			�������� �� ������ �������
	 *  
	 * */
	header('Content-Type: text/html; charset=UTF-8', true);
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/plain; charset=UTF-8' . "\r\n";
	$headers .= 'From: Asecurity' . "\r\n";
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
	function checknumber($num){
		$arrayreplace = array("-","(",")"," ");
		$num = str_replace($arrayreplace,"",$num);
		$result = preg_match('/^(\+?\d+)?\s*(\(\d+\))?[\s-]*([\d-]*)$/', $num, $res);
		if ($num == '')
			$result = 0;
		return $result;
	}
	
	$action = escape_chars($_POST['action']);
	$email = 'packeger@yandex.ru';
	
	
	//�����
	if ($action == 'Feedback'){
		$feedback_name = iconv("utf-8", "windows-1251",escape_chars($_POST['feedback_name']));
		$feedback_text = iconv("utf-8", "windows-1251",escape_chars($_POST['feedback_text']));
		if ($feedback_name == '') {
			$errormessage = '����������, ������� ���� ���.';
		} else {
			if ($feedback_text == ''){
				$errormessage = '����������, �������� ����� ������.';
			}
		}
		if ($feedback_name != '' && $feedback_text != ''){
			$mail_message = "����� �� ".$feedback_name.":\n".$feedback_text;
			mail($email, '�����', iconv("windows-1251", "utf-8" ,$mail_message),$headers);
			$errormessage = "����� ������� ���������.";
		}
	} else if ($action == 'Question'){	//�������� �������
		$contact_name = iconv("utf-8", "windows-1251",escape_chars($_POST['contact_name']));
		$contact_tel = escape_chars($_POST['contact_tel']);
		$contact_text = iconv("utf-8", "windows-1251",escape_chars($_POST['contact_text']));
		if ($contact_name == '') {
			$errormessage = '����������, ������� ���� ���.';
		} else {
			if ($contact_tel == '' || checknumber($contact_tel)==0){
				$errormessage = '����������, ������� ����� ��������.';
			} else {
				if ($contact_text == ''){
					$errormessage = '����������, �������� ����� �������.';
				}
			}
			if ($contact_name != '' && $contact_tel != '' && $contact_text != '' && checknumber($contact_tel)==1){
				$mail_message = '������ �� '.$contact_name.' (��������� �����: '.$contact_tel.") ���������� ����������:\n".$contact_text;
				mail($email, '������', iconv("windows-1251", "utf-8" ,$mail_message),$headers);
				$errormessage = "������ ������� ���������.";
			}
		}
	}else if ($action == 'InstallRequest'){ //������ �� �����������
		$order_person_name = iconv("utf-8", "windows-1251",escape_chars($_POST['order_person_name']));
		$order_person_tel = escape_chars($_POST['order_person_tel']);
		if ($order_person_name == '') {
			$errormessage = '����������, ������� ���� ���.';
		} else {
			if ($order_person_tel == '' || checknumber($order_person_tel)==0){
				$errormessage = '����������, ������� ����� ��������.';
			}
		}
		if ($order_person_name != '' && $order_person_tel != '' && checknumber($order_person_tel)==1){
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
		
			//������������ ��������� �� �����
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

			mail($email, '������ ������ �����������', iconv("windows-1251", "utf-8" ,$mail_message),$headers);
			$errormessage = "������ ������� ����������.";
		}
	} else if($action == 'Callme'){ //�������� ������
		$call_name = iconv("utf-8", "windows-1251",escape_chars($_POST['call_name']));
		$call_tel = escape_chars($_POST['call_tel']);
		if ($call_name == '') {
			$errormessage = '����������, ������� ���� ���.';
		} else {
			if ($call_tel == '' || checknumber($call_tel)==0){
				$errormessage = '����������, ������� ����� ��������.';
			}
		}
		if ($call_name != '' && $call_tel != ''  && checknumber($call_tel)==1){
			$mail_message = "������ ��������� ".$call_name." �� ������ ".$call_tel;
			mail($email, '������ �� ������', iconv("windows-1251", "utf-8" ,$mail_message),$headers);
			$errormessage = "������ ������� ����������.";
		}
	}
	echo iconv("windows-1251", "utf-8",$errormessage);
?>