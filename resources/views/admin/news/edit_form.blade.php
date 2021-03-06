<div class="modal fade" id="{{ $_formId }}">
    <div class="modal-dialog martop10">
        <form role="form" action="/admin/news/edit/{{ $news->id }}" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">编辑新闻</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>新闻标题</label>
                            <input type="text" name="name" class="form-control" value="{{ $news->name }}" required>
                        </div>


                        <div class="form-group">
                            <label>新闻图片</label>
                            <input type="file" name="preview" class="form-control">
                            <p class="help-block text-blue">如不想更换封面请不要上传文件</p>
                        </div>



                        <div class="form-group">
                            <label>新闻内容</label>
                            @include('UEditor::head')
                            <textarea id="ueditors{{ $news->id }}" class="edui-default" name="intro">{!!$news->intro !!}</textarea>
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
