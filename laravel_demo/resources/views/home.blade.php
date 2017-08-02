@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('getListUser')}}">List User</a>
                        </li> 
                        <li>
                            <a href="{{ route('getAddUser')}}">Add User</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
