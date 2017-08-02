@extends('home')

@section('content')
@if (session('status'))
    <div class="alert alert-info">{{session('status')}}</div>
@endif

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                </h1>
            </div>

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Username</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    <tr class="odd gradeX" align="center">
                        <td>{{$u->id}}</td>
                        <td>{{$u->username}}</td>
                        <td>{{$u->address}}</td>
                        <td>{{$u->phone}}</td>
                        <td>{{$u->email}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! route('getDeleteUser', ['id' => $u["id"]]) !!}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('getEditUser', ['id' => $u["id"]]) !!}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

