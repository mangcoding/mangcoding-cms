$('.view').on('click', function(ev){
	ev.preventDefault();
	var target = $(this).attr("data-load");
	$('#modal-box').toggleClass('show');
	$('#modal-box .panel-body').html('<p align="center"><img src="http://disnaker.mangcoding.com/asset/img/loading.gif" width="150" style="padding:150px 0px; margin:0 auto;"/></p>');
	$("#modal-box .panel-body").load(target, function() { 
     	//$('#modal-box').toggleClass('show'); 
    });
	$('#open').toggleClass('none');
	$('#table').toggleClass('none');
});
$('.tutup').on('click', function(){
	$('#modal-box').removeClass('show');
	$('#open').removeClass('none');
	$('#table').removeClass('none');
});