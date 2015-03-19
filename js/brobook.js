jQuery(document).ready(function() {
	$('.dropdown-toggle').dropdown()

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

                $('#tab').append(' <div class="row">' +
                                  '<div class="col-md-12 col-sm-12 col-xs-12">' +
                                    '<form method="post" action="../message/addMessage">' +
                                    '<div class="input-group">' +
                                        '<textarea name="message_content" class="form-control status-text" rows="3"></textarea>' +
                                        '<input type="hidden" name="hidden_c_id" value="'+ m.conversation_id +'"/>' +
                                        '<span class="input-group-addon">' +
                                        '<button type="submit" name="send_message_button" class="btn btn-primary btn-text pull-right"><i class="glyphicon glyphicon-bullhorn"></i></button>' +
                                        '</span>' +
                                    '</form>' +
                                  '</div>' +
                                  '</div>' +
                                  '</div>');
            },
            error: function(){
                alert('Something went wrong');
            }
        });
    });

    $('#friend_select').on('change', function(){
        $('#hidden_firstname').val($('#friend_select').children("option:selected").text() + ", " + $('#hidden_firstname').val());
    });

});

