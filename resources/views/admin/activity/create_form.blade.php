<div class="modal fade" id="{{ $_formId }}">
    <div class="modal-dialog martop10">
        <form role="form" action="{{ route('admin.activity.create') }}" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">创建一个新的活动</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>活动名称</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>活动封面</label>
                            <input type="file" name="preview" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>活动时间</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="acdate" id="datepicker">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <div class="form-group" >
                            <label>活动内容</label>
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
</div>



{{--@section('js')--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>--}}
    {{--<script src="/homestyle/js/daterangepicker/daterangepicker.js"></script>--}}
    {{--<script src="/homestyle/js/datepicker/bootstrap-datepicker.js"></script>--}}
    {{--<script>--}}

        {{--$('#reservation').daterangepicker();--}}


    {{--</script>--}}
{{--@stop--}}

{{--@section('js')--}}
    {{--<script src="//cdn.bootcss.com/wangeditor/2.1.20/js/lib/jquery-1.10.2.min.js"></script>--}}
    {{--<script src="//cdn.bootcss.com/wangeditor/2.1.20/js/wangEditor.js"></script>--}}
{{--<script>--}}

    {{--$('#editor').wangEditor();--}}


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