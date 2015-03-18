jQuery(document).ready(function() {
	$('.dropdown-toggle').dropdown()

    $('#create_conversation_button').click(function(){
        alert('jag är en idiot');
    });

    $(this).find('.conv_form').on('click', function(){

        var message = {
            c_id: $(this).find('.hidden_cid').val()
        };

        $.ajax({
            type: 'POST',
            url: '../message/getMessage',
            dataType: 'json',
            data: message,
            success: function(messages){

                $('#tab').empty();
                for(var i = 0; i < messages.length; i++){
                    var m = messages[i];

                    $('#tab').prepend('<div class="media">' +
                                        '<div class="media-left">' +
                                            '<img id="pro_pic" class="media-object" src="'+ m.profile_img +'" alt="...">' +
                                        '</div>' +
                                        '<div class="media-body">' +
                                            '<h4 class="media-heading"></h4>'+
                                            '<p id="message_content">' + m.content + '</p>' +
                                            '<p>' + m.time +'</p>' +
                                            '<p>' + m.firstname + " " + m.lastname + '</p>' +
                                        '</div>' +
                                     '</div>');
                }

                $('#tab').append('<div class="input- group text-box">' +
                                    '<form method="post" action="../message/addMessage">' +
                                        '<textarea name="message_content" class="form-control" rows="3" style="width:630px; height:78px;"></textarea>' +
                                        '<input type="hidden" name="hidden_c_id" value="'+ m.conversation_id +'"/>' +
                                        '<span class="group-addon pull-right">' +
                                        '<button type="submit" name="send_message_button" class="btn btn-primary btn-text"><i class="glyphicon glyphicon-bullhorn"></i></button>' +
                                        '</span>' +
                                    '</form>' +
                                  '</div>');
            },
            error: function(){
                alert('Something went wrong');
            }
        });
    });
});