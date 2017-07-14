@extends('admin.layouts.app')

@section('title','新闻设置')

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
                    <h3 class="box-title">新闻设置</h3>
                    <a href="/admin/news/create" class="btn btn-info pull-right" ><i class="fa fa-plus" aria-hidden="true"></i> 添加</a>
                    {{--<a href="javascript:;" class="btn btn-info pull-right" data-toggle="modal" data-target="#_create"><i class="fa fa-plus" aria-hidden="true"></i> 添加</a>--}}
                </div>
                <div class="box-body">
                    <table id="resourceTable" class="table table-bordered table-striped dataTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>新闻封面</th>
                            <th>新闻标题</th>
                            {{--<th>新闻内容</th>--}}

                            <th>创建时间</th>
                            <th>最后一次修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($newses as $news)
                            <tr>
                                <td>{{ $news->id }}</td>
                                <td><img src="{{$news->preview}}" class="img-thumbnail"></td>
                                <td>{!!  str_limit($news->name,20) !!}</td>
                                {{--<td>{!! $news->intro  !!}</td>--}}

                                <td>{{ $news->created_at }}</td>
                                <td>{{ $news->updated_at }}</td>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-target="#_edit{{ $news->id }}"
                                       class="btn btn-info btn-sm" id="edits"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</a>
                                    <a href="/admin/news/destroy/{{ $news->id }}"
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
    {{--@include('admin.news.create_form',['_formId' => '_create'])--}}
    @foreach($newses as $news)
        @include('admin.news.edit_form',['_formId' => '_edit'.$news->id,'news' => $news])
    @endforeach
@stop

@section('js')
    @include('admin.layouts.dataTable')



@stop