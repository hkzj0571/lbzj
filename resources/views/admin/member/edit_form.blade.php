<div class="modal fade" id="{{ $_formId }}">
    <div class="modal-dialog martop10">
        <form role="form" action="/admin/members/edit/{{ $member->id }}" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">编辑成员</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>成员名字</label>
                            <input type="text" name="name" class="form-control" value="{{ $member->name }}" required>
                        </div>


                        <div class="form-group">
                            <label>成员手机</label>
                            <input type="text" name="phone" class="form-control" value="{{ $member->phone }}"  required>
                        </div>

                        <div class="form-group">
                            <label>成员微信</label>
                            <input type="text" name="wechat" class="form-control" value="{{ $member->wechat }}"  required>
                        </div>

                        <div class="form-group">
                            <label>参加活动活动</label>
                            <select name="activity_id" class="form-control">
                                @foreach($activitys as $activity)
                                    <option value="{{$activity->id}}" {{$member->activity_id==$activity->id ? 'selected' : ''}}>{{$activity->name}}</option>
                                @endforeach
                            </select>
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
