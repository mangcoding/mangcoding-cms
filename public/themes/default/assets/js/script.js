$(document).ready(function() {
  $.toggleShowPassword = function (options) {
        var settings = $.extend({
            field: "#password",
            control: "#toggle_show_password",
        }, options);

        var control = $(settings.control);
        var field = $(settings.field)

        control.bind('click', function () {
            if (control.is(':checked')) {
                field.attr('type', 'text');
            } else {
                field.attr('type', 'password');
            }
        })
    };

    $("#register").submit(function( event ) {
        var error=0;
        $("#register").find('.required').each(function() {
            var isi = $(this).val();
            if (isi == "") {
                $(this).parent().addClass("has-error");
                error++;
            }else{
                $(this).parent().removeClass("has-error");
            }
        });
        if (error == 0) return true;
        else return false;
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('.loginhref a').on('click', function(ev){
        ev.preventDefault();
        if ($('#loginArea').hasClass('show')) {
            $( "#loginArea" ).fadeOut( "slow", function() {
                $('#loginArea').addClass('hide');
                $('#loginArea').removeClass('show');
            });            
        }
        else{
            $( "#loginArea" ).fadeIn( "fast", function() {
                $('#loginArea').addClass('show');
                $('#loginArea').removeClass('hide');
            });
        }
        //$('#loginArea').toggleClass('show');
    });

    $('.datepicker').datepicker({
         dateFormat: "yy-mm-dd",
         changeMonth: true,
         changeYear: true,
         yearRange: "-100:+0"
    })
});