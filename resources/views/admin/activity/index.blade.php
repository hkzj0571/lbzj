@extends('admin.layouts.app')

@section('title','活动设置')

@section('css')
    <style>
        .img-circle {width: 50px;height: 50px;}
        td {line-height: 50px !important;}
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">活动设置</h3>
                    <a href="javascript:;" class="btn btn-info pull-right" data-toggle="modal" data-target="#_create"><i class="fa fa-plus" aria-hidden="true"></i> 添加</a>
                </div>
                <div class="box-body">
                    <table id="resourceTable" class="table table-bordered table-striped dataTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>活动封面</th>
                            <th>活动名称</th>
                            {{--<th>活动内容</th>--}}
                            <th>活动时间</th>
                            <th>创建时间</th>
                            <th>最后一次修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activitys as $activity)
                            <tr>
                                <td>{{ $activity->id }}</td>
                                <td><img src="{{$activity->preview}}" class="img-thumbnail"></td>
                                <td>{{ $activity->name }}</td>
                                {{--<td>{!! $activity->intro  !!}</td>--}}
                                <td>{{ $activity->acdate }}</td>
                                <td>{{ $activity->created_at }}</td>
                                <td>{{ $activity->updated_at }}</td>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-target="#_edit{{ $activity->id }}"
                                       class="btn btn-info btn-sm" id="edits"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</a>
                                    <a href="/admin/activity/destroy/{{ $activity->id }}"
                                       class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i> 删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.activity.create_form',['_formId' => '_create'])
    @foreach($activitys as $activity)
        @include('admin.activity.edit_form',['_formId' => '_edit'.$activity->id,'activity' => $activity])
    @endforeach
@stop

@section('js')
    @include('admin.layouts.dataTable')



@stop