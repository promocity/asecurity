<?php
	function escape_chars($strinput){
		if(is_array($strinput))
			return "";
		if(!empty($strinput) && is_string($strinput)) {
			$strinput = str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a",'<','>'), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z','&gt;','&lt;'), $strinput);
			return htmlspecialchars(trim($strinput));
		}
	}
	$feedback_name = escape_chars($_POST['feedback_name']);
	$feedback_text = escape_chars($_POST['feedback_text']);
	if ($feedback_name == '') {
		$errormessage = '����������, ������� ���� ���.';
	} else {
		if ($feedback_text == ''){
			$errormessage = '����������, �������� ����� ������.';
		}
	}
	if ($feedback_name != '' && $feedback_text != ''){
		mail('packeger@yandex.ru', '������ ������ �����������', $mail_message);
		$errormessage = "������ ������� ����������.";
	}
	echo $errormessage;
?>