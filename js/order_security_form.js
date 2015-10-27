function OrderSecurity(){
    $.ajax({
        type: "POST",
        url: "/ASecuritySendMail.php",
        data: 'order_person_name='+$('#order-person-name').val()+
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
                alert(data);
        }
    });
}