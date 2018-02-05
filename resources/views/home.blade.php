@extends('layouts.app')

@section('navigation')
<li class="active"><a href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a></li>
<li><a href="{{ route('properties.index') }}">Imóveis</a></li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bem-vindo!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
