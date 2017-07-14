@extends('admin.layouts.app')

@section('title','新闻添加')

@section('css')
    <style>
        .img-circle {width: 50px;height: 50px;}
        td {line-height: 50px !important;}
    </style>
@stop

@section('content')
    <div class="modal-dialog martop10">
        <form role="form" action="{{ route('admin.news.create') }}" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">创建一个新的新闻</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>新闻标题</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>活动封面</label>
                            <input type="file" name="preview" class="form-control" required>
                        </div>



                        <div class="form-group" >
                            <label>新闻内容</label>
                            {{--<div id="editor"></div>--}}
                            {{--<div id="editor"></div>--}}
                            {{--<textarea  id="editor"    name="intro"  ></textarea> --}}
                            @include('UEditor::head')
                            <textarea id="ueditor" class="edui-default" name="intro"></textarea>
                        </div>



                    </div>
                </div>
                <div class="modal-footer">
                    {{ csrf_field() }}
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-info">提交</button>
                </div>
            </div>
        </form>
    </div>


@stop
{{--<div class="modal fade" id="{{ $_formId }}">--}}
    {{--<div class="modal-dialog martop10">--}}
        {{--<form role="form" action="{{ route('admin.news.create') }}" method="post" enctype="multipart/form-data">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">×</span></button>--}}
                    {{--<h4 class="modal-title">创建一个新的新闻</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<div class="box-body">--}}
                        {{--<div class="form-group">--}}
                            {{--<label>新闻标题</label>--}}
                            {{--<input type="text" name="name" class="form-control" required>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label>活动封面</label>--}}
                            {{--<input type="file" name="preview" class="form-control" required>--}}
                        {{--</div>--}}



                        {{--<div class="form-group" >--}}
                            {{--<label>新闻内容</label>--}}
                            {{--<div id="editor"></div>--}}
                            {{--<div id="editor"></div>--}}
                            {{--<textarea  id="editor"    name="intro"  ></textarea> --}}
                            {{--@include('UEditor::head')--}}
                            {{--<textarea id="ueditor" class="edui-default" name="intro"></textarea>--}}
                        {{--</div>--}}



                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">取消</button>--}}
                    {{--<button type="submit" class="btn btn-info">提交</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</form>--}}
    {{--</div>--}}
{{--</div>--}}



{{--@section('js')--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>--}}
    {{--<script src="/homestyle/js/daterangepicker/daterangepicker.js"></script>--}}
    {{--<script src="/homestyle/js/datepicker/bootstrap-datepicker.js"></script>--}}
    {{--<script>--}}

        {{--$('#reservation').daterangepicker();--}}


    {{--</script>--}}
{{--@stop--}}

@section('js')

<script>

    var ue=UE.getEditor("ueditor");
    ue.ready(function(){
        //因为Laravel有防csrf防伪造攻击的处理所以加上此行
        ue.execCommand('serverparam','_token','{{ csrf_token() }}');
    });


</script>
@stop