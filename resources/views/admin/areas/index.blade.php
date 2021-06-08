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
                    <i class="fa fa-dashboard"></i> 領域管理
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
                            <th width="5%" style="text-align: center">領域編號</th>
                            <th width="5%" style="text-align: center">領域名稱</th>
                        </thead>
                        @foreach($areas as $areas)
                            <tr>
                                <td>{{$areas->id}}</td>
                                <td>{{$areas->name}}</td>
                                <td width="1%" style="text-align: center">
                                <form action="{{ route('admin.areas.destroy', $areas->id) }}" method="POST" style="display:inline">
                                    @method('DELETE')
                                    @csrf
                                    @if($areas->count===0)
                                        <button class="btn btn-sm btn-danger" type="submit">刪除</button>
                                    @else
                                        <button title="此領域已有題目，不可刪除" class="btn btn-sm btn-danger" disabled="disabled" type="submit" >刪除</button>
                                    @endif
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <form action="{{ route('admin.areas.store') }}" method="POST" style="display:inline">
                        @method('post')
                        @csrf
                        新增領域:<input type="text" name="name">
                        <button class="" type="submit">送出</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
