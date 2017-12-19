
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! MR {{Auth::user()->name}}
                    <img src="images/{{Auth::user()->image}}" alt="no_pic" width="200" height="200" >
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
