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
		$errormessage = 'Пожалуйста, укажите Ваше имя.';
	} else {
		if ($feedback_text == ''){
			$errormessage = 'Пожалуйста, напишите текст обзора.';
		}
	}
	if ($feedback_name != '' && $feedback_text != ''){
		mail('packeger@yandex.ru', 'Заявка онлайн подключения', $mail_message);
		$errormessage = "Заявка успешно отправлена.";
	}
	echo $errormessage;
?>