@extends('admin.layouts.app')

@section('title','报名设置')

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
                    <h3 class="box-title">报名设置</h3>
                    <a href="javascript:;" class="btn btn-info pull-right" data-toggle="modal" data-target="#_create"><i class="fa fa-plus" aria-hidden="true"></i> 添加</a>
                </div>
                <div class="box-body">
                    <table id="resourceTable" class="table table-bordered table-striped dataTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>人员名称</th>
                            <th>联系方式</th>
                            <th>参加活动</th>
                            <th>微信号</th>
                            <th>创建时间</th>
                            <th>最后一次修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            <tr>
                                <td>{{ $member->id }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->phone }}</td>
                                <td>{{ $member->activity->name }}</td>
                                <td>{{ $member->wechat }}</td>
                                <td>{{ $member->created_at }}</td>
                                <td>{{ $member->updated_at }}</td>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-target="#_edit{{ $member->id }}"
                                       class="btn btn-info btn-sm" id="edits"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</a>
                                    <a href="/admin/member/destroy/{{ $member->id }}"
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
    @include('admin.member.create_form',['_formId' => '_create'])
    @foreach($members as $member)
        @include('admin.member.edit_form',['_formId' => '_edit'.$member->id,'member' => $member])
    @endforeach
@stop

@section('js')
    @include('admin.layouts.dataTable')



@stop