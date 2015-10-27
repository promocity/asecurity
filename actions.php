<?php
	/*	escape_chars	очищает строку от инъекций кода
	 *  getbool			получает из строки булевую
	 *  
	 * */

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
	
	$action = escape_chars($_POST['action']);
	$email = 'packeger@yandex.ru';
	
	
	//Обзор
	if ($action == 'Feedback'){
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
			$mail_message = "Обзор от ".$feedback_name.":\n".$feedback_text;
			mail($email, 'Обзор от '.$feedback_name, $mail_message);
			$errormessage = "Обзор успешно отправлен.";
		}
	} else if ($action == 'Question'){	//Отправка вопроса
		$contact_name = escape_chars($_POST['contact_name']);
		$contact_tel = escape_chars($_POST['contact_tel']);
		$contact_text = escape_chars($_POST['contact_text']);
		if ($contact_name == '') {
			$errormessage = 'Пожалуйста, укажите Ваше имя.';
		} else {
			if ($contact_tel == ''){
				$errormessage = 'Пожалуйста, укажите номер телефона.';
			} else {
				if ($contact_text == ''){
					$errormessage = 'Пожалуйста, напишите текст вопроса.';
				}
			}
			if ($contact_name != '' && $contact_tel != '' && $contact_text != ''){
				$mail_message = 'Вопрос от '.$contact_name.' (Контакный номер: '.$contact_tel."):\n".$contact_text;
				mail($email, 'Вопрос от '.$contact_name, $mail_message);
				$errormessage = "Вопрос успешно отправлен.";
			}
		}
	}else if ($action == 'InstallRequest'){ //заявка на подключение
		$order_person_name = escape_chars($_POST['order_person_name']);
		$order_person_tel = escape_chars($_POST['order_person_tel']);
		if ($order_person_name == '') {
			$errormessage = 'Пожалуйста, укажите Ваше имя.';
		} else {
			if ($order_person_tel == ''){
				$errormessage = 'Пожалуйста, укажите номер телефона.';
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
		
			//формирование сообщения на почту
			$mail_message = 'Поступила заявка от '.$order_person_name.' (Контактный телефон: '.$order_person_tel.') на следующие услуги стоимостью '.$price.': '."\n";
			if ($signaling == true)
				$mail_message .= "Сигнализация\n";
			if ($alarm_button == true)
				$mail_message .= "Тревожная кнопка\n";
			if ($gas == true)
				$mail_message .= "Оповещение об утечке газа\n";
			if ($fire == true)
				$mail_message .= "Оповещение о возгорании\n";
			if ($water == true)
				$mail_message .= "Оповещение о затоплении\n";
			if ($service == true)
				$mail_message .= "Сервисное обслуживание\n";
			if ($night == true)
				$mail_message .= "Ночной режим\n";
			if ($online_control == true)
				$mail_message .= "Онлайн контроль\n";

				mail($email, 'Заявка онлайн подключения', $mail_message);
				$errormessage = "Заявка успешно отправлена.";
		}
	if ($action == 'Callme'){ //заказать звонок
		$call_name = escape_chars($_POST['call_name']);
		$call_tel = escape_chars($_POST['call_tel']);
		if ($call_name == '') {
			$errormessage = 'Пожалуйста, укажите Ваше имя.';
		} else {
			if ($call_tel == ''){
				$errormessage = 'Пожалуйста, укажите номер телефона.';
			}
		}
		if ($call_name != '' && $call_tel != ''){
			$mail_message = "Просит позвонить ".$call_name." по номеру ".$call_tel;
			mail($email, 'Заявка на звонок от '.$call_name, $mail_message);
			$errormessage = "Заявка успешно отправлена.";
		}
	} else if ($action == 'Question'){	//Отправка вопроса
		$contact_name = escape_chars($_POST['contact_name']);
		$contact_tel = escape_chars($_POST['contact_tel']);
		$contact_text = escape_chars($_POST['contact_text']);
		if ($contact_name == '') {
			$errormessage = 'Пожалуйста, укажите Ваше имя.';
		} else {
			if ($contact_tel == ''){
				$errormessage = 'Пожалуйста, укажите номер телефона.';
			} else {
				if ($contact_text == ''){
					$errormessage = 'Пожалуйста, напишите текст вопроса.';
				}
			}
			if ($contact_name != '' && $contact_tel != '' && $contact_text != ''){
				$mail_message = 'Вопрос от '.$contact_name.' (Контакный номер: '.$contact_tel."):\n".$contact_text;
				mail($email, 'Вопрос от '.$contact_name, $mail_message);
				$errormessage = "Вопрос успешно отправлен.";
			}
		}
	}
	echo $errormessage;
?>