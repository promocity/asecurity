function OutData(inResultForm){
	//Close_modal();
	//валидация
    //el.innerHTML = inResultForm;
	$('#modal-content-window-2').attr('class', 'modal-content-window-2');
	$('#modal-content-window-2').addClass('modal-content-window-2-show');
	setTimeout(function(){$('#modal-content-window-2').attr('class', 'modal-content-window-2')},10000);
	console.log(inResultForm);
}


function OrderSecurity(){	//отправка данных с формы заказа
    $.ajax({
        type: "POST",
        url: "actions.php",
        data: 'action=InstallRequest'+
              '&order_person_name='+$('#order-person-name').val()+
              '&order_person_tel='+$('#order-person-tel').val()+
              '&signaling='+$('#signaling').prop( "checked" )+
              '&alarm_button='+$('#alarm-button').prop( "checked" )+
              '&gas='+$('#gas').prop( "checked" )+
              '&fire='+$('#fire').prop( "checked" )+
              '&water='+$('#water').prop( "checked" )+
              '&service='+$('#service').prop( "checked" )+
              '&night='+$('night').prop( "checked" )+
              '&online_control='+$('#online_control').prop( "checked" )+
              '&price='+$('#price-block-price').text()+
              '&price_month='+$('#price-block-price-month').text(),
        success: function(data){
		/*
			Действия для вывода уведовлений
			data - выводимый текст
		*/
			OutData(data);
        }
    });
	
}
function FeedbackSend(){	//отправка отзыва
    $.ajax({
        type: "POST",
        url: "actions.php",
        data: 'action=Feedback'+
              '&feedback_name='+$('#feedback_name').val()+
              '&feedback_text='+$('#feedback_text').val(),
        success: function(data){
		/*
			Действия для вывода уведовлений
			data - выводимый текст
		*/
            OutData(data);
        }
    });
	
}
function Callme(){	//отправка заявки на звонок
    $.ajax({
        type: "POST",
        url: "actions.php",
        data: 'action=Callme'+
              '&call_name='+$('#call_name').val()+
              '&call_tel='+$('#call_tel').val(),
        success: function(data){
		/*
			Действия для вывода уведовлений
			data - выводимый текст
		*/
            OutData(data);
        }
    });
	
}
function Modal_Callme(){	//отправка заявки на звонок с модального окна
    $.ajax({
        type: "POST",
        url: "actions.php",
        data: 'action=Callme'+
              '&call_name='+$('#modal_call_name').val()+
              '&call_tel='+$('#modal_call_tel').val(),
        success: function(data){
		/*
			Действия для вывода уведовлений
			data - выводимый текст
		*/
            OutData(data);
        }
    });
	
}
function SendQuestion(){	//отправка вопроса
	$.ajax({
        type: "POST",
        url: "actions.php",
        data: 'action=Question'+
              '&contact_name='+$('#contact_name').val()+
              '&contact_tel='+$('#contact_tel').val()+
              '&contact_text='+$('#contact_text').val(),
        success: function(data){
		/*
			Действия для вывода уведовлений
			data - выводимый текст
		*/
            OutData(data);
               
        }
    });
	
}