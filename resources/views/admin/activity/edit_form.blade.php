<div class="modal fade" id="{{ $_formId }}">
    <div class="modal-dialog martop10">
        <form role="form" action="/admin/activity/edit/{{ $activity->id }}" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">编辑活动</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>活动名称</label>
                            <input type="text" name="name" class="form-control" value="{{ $activity->name }}" required>
                        </div>


                        <div class="form-group">
                            <label>活动封面</label>
                            <input type="file" name="preview" class="form-control">
                            <p class="help-block text-blue">如不想更换封面请不要上传文件</p>
                        </div>

                        <div class="form-group">
                            <label>活动时间</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                {{--<input type="text" class="form-control pull-right" name="acdate" id="datepicker">--}}
                                <input type="text" class="form-control pull-right" name="acdate" id="datepicker{{ $activity->id }}" value="{{ $activity->acdate }}" required>
                            </div>
                            <!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label>活动内容</label>
                            @include('UEditor::head')
                            <textarea id="ueditors{{ $activity->id }}" class="edui-default" name="intro">{!!$activity->intro !!}</textarea>
                        </div>

                        {{--<div class="form-group">--}}
                            {{--<label>活动时间</label>--}}
                            {{--<input type="text" name="acdate" class="form-control" >--}}
                        {{--</div>--}}




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
