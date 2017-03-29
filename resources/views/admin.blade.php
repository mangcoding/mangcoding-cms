<?PHP $admin = Auth::user(); ?>
@extends('layouts.admin')
@section('body')
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div><!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div id="wrapper">

            <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('admin/header')
            <!-- /.navbar-top-links -->
            @include('admin/menu')
            <!-- /.navbar-static-side -->
        </nav>
         @include('admin/'.$content)
    </div>
@stop