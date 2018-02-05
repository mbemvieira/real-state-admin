@extends('layouts.app')

@section('navigation')
<li><a href="{{ route('home') }}">Home</a></li>
<li class="active"><a href="{{ route('properties.index') }}">Imóveis <span class="sr-only">(current)</span></a></li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adicionar Imóvel</div>

                <div class="panel-body">
                    <form method="POST" accept-charset="UTF-8"
                        action="{{ route('properties.store') }}"
                        id="property-form"
                    >
                        {{ csrf_field() }}
                        @include('property.form', ['submitButtonText' => 'Adicionar'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
