<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator Panel</title>
	@section('head')
    <!-- Bootstrap Core CSS -->
    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/js/metisMenu/metisMenu.min.css') !!}
    {!! Html::style('assets/css/sb-admin-2.css') !!}
    {!! Html::style('assets/font-awesome-4.5.0/css/font-awesome.css')  !!}
    {!! Html::style('assets/js/calender/jquery-ui.css') !!}

    {!! Html::script('assets/js/jquery.min.js') !!}
    {!! Html::script('assets/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/metisMenu/metisMenu.min.js') !!}
    {!! Html::script('assets/js/wizard/jquery.bootstrap.wizard.min.js') !!}
    {!! Html::script('assets/js/calender/jquery-ui.js') !!}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	@show  
</head>

<body>
	@yield('body')
</body>
	@section('footer')
    {!! Html::script('assets/js/sb-admin-2.js') !!}
    <script>
    $("a[data-target=#myModal]").click(function(ev) {
        ev.preventDefault();
        var target = $(this).attr("href");

        // load the url and show modal on success
        $("#myModal .modal-content").html('');
        $("#myModal .modal-content").html('<p align="center"><img src="https://docs.sencha.com/cmd/6.x/images/loading.gif" width="150" style="padding:150px 0px; margin:0 auto;"/></p>');
        $("#myModal .modal-content").load(target, function() { 
             $("#myModal").modal("show"); 
        });
    });
    </script>
	@show 
</html>
