var default_signality = false;
var default_alarm_button = false;
var default_gas = false;
var default_fire = false;
var default_water = false;
var default_service = false;
var default_night = false;
var default_online_control = false;

function calculate(clicked_element){	
	//цена вверху страницы
	var price_up = document.getElementById('security-home-content-price');
	
	//услуги
	var signaling = document.getElementById('signaling');
	var alarm_button = document.getElementById('alarm-button');
	
	//доп. услуги
	var gas = document.getElementById('gas');
	var fire = document.getElementById('fire');
	var water = document.getElementById('water');
	var service = document.getElementById('service');
	var night = document.getElementById('night');
	var online_control = document.getElementById('online_control');
	
	//стоимость и цена в мес¤ц внизу страницы
	var price_down1 = document.getElementById('price-block-price');
	var price_down2 = document.getElementById('price-block-price-month');
	
	//price1 - стоимость установки
	//price2 - стоимость обслуживани¤
	var signaling_price1 = 12590;
	var signaling_price2 = 600;
	var alarm_button_price1 = 2000;
	var alarm_button_price2 = 300;
	var alarm_button_alone_price_1 = 8200;
	var alarm_button_alone_price_2 = 2000;
	var gas_price1 = 2500;
	var gas_price2 = 50;
	var fire_price1 = 2500;
	var fire_price2 = 50;
	var water_price1 = 2500;
	var water_price2 = 50;
	var service_price1 = 0;
	var service_price2 = 0;
	var night_price1 = 2500;
	var night_price2 = 50;
	var online_control_price1 = 0;
	var online_control_price2 = 100;

	var price1_result = 0 ;
	var price2_result = 0 ;
	
	var signaling2 = document.getElementById('additional-block-security');
	var alarm_button2 = document.getElementById('additional-block-alarm-button');
	var gas2 = document.getElementById('additional-block-gas');
	var fire2 = document.getElementById('additional-block-fire');
	var water2 = document.getElementById('additional-block-water');
	var service2 = document.getElementById('additional-block-service');
	var night2 = document.getElementById('additional-block-night');
	var online_control2 = document.getElementById('additional-block-online-control');
	
	
	//$("#additional-block-security").prop("checked", true);
	if (clicked_element == signaling || clicked_element == signaling2){
		default_signality = !default_signality;
	}
	if (clicked_element == alarm_button || clicked_element == alarm_button2){
		default_alarm_button = !default_alarm_button;
	}
	if (clicked_element == gas || clicked_element == gas2){
		default_gas = !default_gas;
	}
	if (clicked_element == fire || clicked_element == fire2){
		default_fire = !default_fire;
	}
	if (clicked_element == water || clicked_element == water2){
		default_water = !default_water;
	}
	if (clicked_element == service || clicked_element == service2){
		default_service = !default_service;
	}
	if (clicked_element == night || clicked_element == night2){
		default_night = !default_night;
	}
	if (clicked_element == online_control || clicked_element == online_control2){
		default_online_control = !default_online_control;
	}
	
	
	if (default_signality == true){
		price1_result += signaling_price1;
		price2_result += signaling_price2;
		$("#signaling").prop("checked", true);
		$("#additional-block-security").prop("checked", true);
	} else {
		$("#signaling").prop("checked", false);
		$("#additional-block-security").prop("checked", false);
	}
	if (default_alarm_button == true && default_signality == true){
		price1_result += alarm_button_price1;
		price2_result += alarm_button_price2;
		$("#alarm-button").prop("checked", true);
		$("#additional-block-alarm-button").prop("checked", true);
	} 
	if (default_alarm_button == true && default_signality == false){
		price1_result += alarm_button_alone_price_1;
		price2_result += alarm_button_alone_price_2;
		$("#alarm-button").prop("checked", true);
		$("#additional-block-alarm-button").prop("checked", true);
	}
	if (default_alarm_button == false){
		$("#alarm-button").prop("checked", false);
		$("#additional-block-alarm-button").prop("checked", false);
	}
	if (default_gas == true){
		price1_result += gas_price1;
		price2_result += gas_price2;
		$("#gas").prop("checked", true);
		$("#additional-block-gas").prop("checked", true);
	}else{
		$("#additional-block-gas").prop("checked", false);
		$("#gas").prop("checked", false);
	}
	if (default_fire == true){
		price1_result += fire_price1;
		price2_result += fire_price2;
		$("#additional-block-fire").prop("checked", true);
		$("#fire").prop("checked", true);
	}else{
		$("#additional-block-fire").prop("checked", false);
		$("#fire").prop("checked", false);
	}
	if (default_water == true){
		price1_result += water_price1;
		price2_result += water_price2;
		$("#additional-block-water").prop("checked", true);
		$("#water").prop("checked", true);
	}else{
		$("#additional-block-water").prop("checked", false);
		$("#water").prop("checked", false);
	}
	if (default_service == true){
		price1_result += service_price1;
		price2_result += service_price2;
		$("#additional-block-service").prop("checked", true);
		$("#service").prop("checked", true);
	}else{
		$("#additional-block-service").prop("checked", false);
		$("#service").prop("checked", false);
	}
	if (default_night == true){
		price1_result += night_price1;
		price2_result += night_price2;
		$("#additional-block-night").prop("checked", true);
		$("#night").prop("checked", true);
	}else{
		$("#additional-block-night").prop("checked", false);
		$("#night").prop("checked", false);
	}
	if (default_online_control == true){
		price1_result += online_control_price1;
		price2_result += online_control_price2;
		$("#additional-block-online-control").prop("checked", true);
		$("#online_control").prop("checked", true);
	}else{
		$("#additional-block-online-control").prop("checked", false);
		$("#online_control").prop("checked", false);
	}
	
	if (price1_result > 999){
		price1_result_1000 = Math.trunc(price1_result / 1000);
		price1_result_1 = price1_result % 1000;
		if (price1_result_1==0){
			price_up.innerHTML = price1_result_1000+' 00'+price1_result_1+' P';
			price_down1.innerHTML = price1_result_1000+' 00'+price1_result_1+' P';
		} 
		if (price1_result_1>0 && price1_result_1<=99){
			price_up.innerHTML = price1_result_1000+' 0'+price1_result_1+' P';
			price_down1.innerHTML = price1_result_1000+' 0'+price1_result_1+' P';
		}
		if (price1_result_1>99){
			price_up.innerHTML = price1_result_1000+' '+price1_result_1+' P';
			price_down1.innerHTML = price1_result_1000+' '+price1_result_1+' P';
		}
	}else{
		price_up.innerHTML = price1_result+' P';
		price_down1.innerHTML = price1_result+' P';
	}
	if (price2_result > 999){
		price2_result_1000 = Math.trunc(price2_result / 1000);
		price2_result_1 = price2_result % 1000;
		if (price2_result_1==0){
			price_down2.innerHTML = price2_result_1000+' 00'+price2_result_1+' P';	
		}
		if(price2_result_1>0 && price2_result_1<=99){
			price_down2.innerHTML = price2_result_1000+' 0'+price2_result_1+' P';	
		}
		if (price2_result_1>99){
			price_down2.innerHTML = price2_result_1000+' '+price2_result_1+' P';	
		}
	}else{
		price_down2.innerHTML = price2_result+' P';
	}
	
	
}