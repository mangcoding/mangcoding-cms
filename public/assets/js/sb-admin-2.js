function sansAccent(str){
    var accent = [
        /[\300-\306]/g, /[\340-\346]/g, // A, a
        /[\310-\313]/g, /[\350-\353]/g, // E, e
        /[\314-\317]/g, /[\354-\357]/g, // I, i
        /[\322-\330]/g, /[\362-\370]/g, // O, o
        /[\331-\334]/g, /[\371-\374]/g, // U, u
        /[\321]/g, /[\361]/g, // N, n
        /[\307]/g, /[\347]/g // C, c
    ];
    var noaccent = ['A','a','E','e','I','i','O','o','U','u','N','n','C','c'];
    for(var i = 0; i < accent.length; i++){
        str = str.replace(accent[i], noaccent[i]);
    }
    return str;
}

$(function() {
    $('#side-menu').metisMenu();
});
$( document ).on( "change", ".pagetype", function() {
    var cat = $(this).val();
    if (cat == 2 || cat == 3 || cat == 4) {
        $('.featured').show();
        if (cat == 3) 
            $('.event-date').show();
        else 
            $('.event-date').hide();
    }else {
        $('.featured').hide();
        $('.event-date').hide();
    }
});

$( document ).on( "keyup", "#title_id", function() {
    var str = sansAccent($(this).val());
    str = str.replace(/[^a-zA-Z0-9\s]/g,"");
    str = str.toLowerCase();
    str = str.replace(/\s/g,'-');
    $("#permalien").val(str); 
});

$( document ).on( "change", ".galCate", function() {
    var cat = $(this).val();
    if (cat == 1) {
        $('.url').show();
        $('.embed').hide();
    }else {
        $('.url').hide();
        $('.embed').show();
    }
});

$( document ).on( "change", "input[name='featured']", function() {
    if ($('input[name="featured"]').is(':checked') == true) {
        $('.images-featured').show();
    }else{
        $('.images-featured').hide();
    }
});

$('#rootwizard').bootstrapWizard({'nextSelector': '.button-next', 'previousSelector': '.button-previous', 'firstSelector': '.button-first', 'lastSelector': '.button-last',
        formPluginEnabled: true,
        validationEnabled: true,
        focusFirstInput : true,
        onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index+1;
        var $percent = ($current/$total) * 100;
        $('#rootwizard').find('.progress-bar').css({width:$percent+'%'});
    }, onNext: function(tab, navigation, index) {
        if (index==1) {
            $('#cat').find('.required').each(function() {
                var ok = $(this).val();
                if (ok == "") {
                    $(this).parent().addClass("has-error");
                }else{
                    $(this).parent().removeClass("has-error");
                }
            });
        }else if (index==2) {
            $('#en').find('.required').each(function() {
                var ok = $(this).val();
                if (ok == "") {
                    $(this).parent().addClass("has-error");
                }else{
                    $(this).parent().removeClass("has-error");
                }
            });
        }else if (index==3) {
            $('#id').find('.required').each(function() {
                var ok = $(this).val();
                if (ok == "") {
                    $(this).parent().addClass("has-error");
                }else{
                    $(this).parent().removeClass("has-error");
                }
            });
        }
        if ($( ".form-group" ).hasClass( "has-error" ) == true)
            return false;
        else return true;
    }, onTabClick: function(tab, navigation, index) {
        return false;
    }});

$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse')
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse')
        }

        height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    })
    $('.datepicker').datepicker({
         dateFormat: "yy-mm-dd",
         changeMonth: true,
         changeYear: true,
         yearRange: "-100:+0"
    })

    $('form').submit(function(){ 
        $('form').find('.required').each(function() {
            var ok = $(this).val();
            if (ok == "") {
                $(this).parent().addClass("has-error");
            }else{
                $(this).parent().removeClass("has-error");
            }
        });

        $('form').find('input:radio.required').each(function() {
            pilihan = $(this).attr("name");
            pilihan = $('input[name="'+pilihan+'"]');
            if (pilihan.is(':checked') == false) {
                pilihan.parent().parent().parent().addClass("has-error");
            }else{
                pilihan.parent().parent().parent().removeClass("has-error");
            }
        });

        if ($('form').find( ".form-group" ).hasClass( "has-error" ) == true) {
            return false;
        }
        else 
            return true;
    });
});
