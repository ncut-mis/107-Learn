@extends('admin.layouts.master')

@section('title', '主控台')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                所有問題 <small></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> 問題管理
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="5%" style="text-align: center">問題編號</th>
                            <th width="5%" style="text-align: center">使用者ID</th>
                            <th width="15%" style="text-align: center">標題</th>
                            <th width="30%" style="text-align: center">內容</th>
                            <th width="5%" style="text-align: center">狀態</th>
                        </thead>
                        @foreach($questions as $questions)
                            <tr>
                                <td>{{$questions->id}}</td>
                                <td>{{$questions->user}}</td>
                                <td>{{($questions->title)}}</td>
                                <td> {!! html_entity_decode($questions->content) !!}</td>
                                <td>{{($questions->status)}}</td>

                                <td width="1%" style="text-align: center">
                                <form action="{{ route('admin.questions.destroy', $questions->id) }}" method="POST" style="display:inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit">刪除</button>
                                </form>
                                </td>
                                <td width="1%" style="text-align: center">
                                    <form method="post" action="{{ route('admin.questions.update', $questions->id) }}"style="display:inline" role="form">
                                        @method('post')
                                        @csrf
                                        <button class="btn btn-sm" type="submit">隱藏</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
@endsection
