function FeedbackSend(){
    $.ajax({
        type: "POST",
        url: "/feedback.php",
        data: 'feedback_name='+$('#feedback_name').val()+
              '&feedback_text='+$('#feedback_text').val(),
        success: function(data){
                alert(data);
        }
    });
}