jQuery(document).ready(function() {
	$('.dropdown-toggle').dropdown()

    $('#create_conversation_button').click(function(){
        alert('jag är en idiot');
    });

    /*
    var frm = $('#conv_form');
    frm.submit(function (ev) {
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function () {
                alert('hora');
            }
        });

        ev.preventDefault();
    });


    $.post( "test.php", { name: "John", time: "2pm" })
        .done(function( data ) {
            alert( "Data Loaded: " + data );
        });

    */

    // Attach a submit handler to the form
    $( "#conv_form" ).submit(function( event ) {

        // Stop form from submitting normally
        event.preventDefault();

        // Get some values from elements on the page:
        var $form = $( this ),
            term = $form.find( "input[name='c_id']" ).val(),
            url = $form.attr( "action" );

        // Send the data using post
        var posting = $.post( url, { s: term } );

        // Put the results in a div
        posting.done(function( data ) {
            alert(data);
            //var content = $( data ).find( "#content" );
            //$( "#result" ).empty().append( content );
        });
    });

    function submitForm(){
        alert('jag är galen');

    }
});