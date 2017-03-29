$(document).ready(function() {
  var $total = $('#rootwizard').find('.prog-1').find('li').length;
  $('#rootwizard').find('.button-last').hide();
  $('#rootwizard').find('.button-previous').hide();
  $('#rootwizard').bootstrapWizard({
        'nextSelector': '.button-next', 
        'previousSelector': '.button-previous', 
        'firstSelector': '.button-first', 
        'lastSelector': '.button-last',
        onTabShow: function(tab, navigation, index) {
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('#rootwizard').find('.prog-1>span').css({width:$percent+'%'});
            if ($current == $total) {
                $('.button-last').show();
                $('.button-next').hide();
            }else if ($current == 1) {
                $('.button-next').show();
                $('.button-previous').hide();
            }else{
                $('.button-next').show();
                $('.button-previous').show();
                 $('.button-last').hide();
            }
        }
        ,onNext: function(tab,nav,index) {
            if (index==1) $tab = $('#tab1');
            else if (index==2) $tab = $('#tab2');
            else if (index==3) $tab = $('#tab3');
            else $tab = $('#tab4');

            $tab.find('.required').each(function() {
                var ok = $(this).val();
                if (ok == "") {
                    if ( $(this).attr('type') == 'file' ) 
                        $(this).parent().find(".border-circle").addClass("has-error");
                    else
                        $(this).parent().addClass("has-error");
                }else{
                    if ( $(this).attr('type') == 'file' ) 
                         $(this).parent().find(".border-circle").removeClass("has-error");
                    else
                         $(this).parent().removeClass("has-error");
                }
            });

            $tab.find('input:radio.required').each(function() {
                pilihan = $(this).attr("name");
                pilihan = $('input[name="'+pilihan+'"]');
                if (pilihan.is(':checked') == false) {
                    pilihan.parent().parent().parent().addClass("has-error");
                }else{
                    pilihan.parent().parent().parent().removeClass("has-error");
                }
            });
            if ($tab.find( ".form-group .col-sm-9" ).hasClass( "has-error" ) == true)
                return false;
            else 
                return true;
        }
        ,onPrevious:function(tab,nav,index) {
            $('#rootwizard').find('.prog-1>li').next().find('span').show();
        }
        ,onTabClick: function(tab, navigation, index) {
            return false;
        }
    });

    $('#rootwizard').on('keyup keypress', function(e) {
      var code = e.keyCode || e.which;
      if (code == 13) { 
        e.preventDefault();
        return false;
      }
    });

    $('#rootwizard').submit(function(){ 
        $('#tab4').find('.required').each(function() {
            var ok = $(this).val();
            if (ok == "") {
                if ( $(this).attr('type') == 'file' ) 
                    $(this).parent().find(".border-circle").addClass("has-error");
                else
                    $(this).parent().addClass("has-error");
            }else{
                if ( $(this).attr('type') == 'file' ) 
                     $(this).parent().find(".border-circle").removeClass("has-error");
                else
                     $(this).parent().removeClass("has-error");
            }
        });

        $('#tab4').find('input:radio.required').each(function() {
            pilihan = $(this).attr("name");
            pilihan = $('input[name="'+pilihan+'"]');
            if (pilihan.is(':checked') == false) {
                pilihan.parent().parent().parent().addClass("has-error");
            }else{
                pilihan.parent().parent().parent().removeClass("has-error");
            }
        });

        if ($('#tab4').find( ".form-group .col-sm-9" ).hasClass( "has-error" ) == true) {
            return false;
        }
        else 
            return true;
    });

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#gambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#avatar").change(function(){
        readURL(this);
    });

    $("input[name=\"civilization\"]").change(function() {
        civil = $(this).val();
        if (civil == "WNA") {
            $("#kewarganegaraan").show();
            $('#kewarganegaraan').find("#country").addClass("required");
        }else {
            $("#kewarganegaraan").hide();
            $('#kewarganegaraan').find("#country").removeClass("required");
        }
    });

    $("input[name=\"active\"]").change(function() {
        civil = $(this).val();
        if (civil == "0") {
            $(".berhenti").show();
            $('.berhenti').find("#disactiveDate").addClass("required");
            $('.berhenti').find("#reason").addClass("required");
        }else {
            $(".berhenti").hide();
            $('.berhenti').find("#disactiveDate").removeClass("required");
            $('.berhenti').find("#reason").removeClass("required");
        }
    });

    cekAdress = $('input[name="sameAdress"]');
    cekAdress.bind('click', function () {
        if (cekAdress.is(':checked')) {
            $('#tempatTinggal').hide();
        } else {
            $('#tempatTinggal').show();
        }
    })
});