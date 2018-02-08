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
                <div class="panel-heading">Imóveis</div>

                <div class="panel-body">

                    <form method="POST" accept-charset="UTF-8"
                        action="{{ route('properties.import') }}"
                        enctype="multipart/form-data"
                        id="import-form"
                    >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="import">Importar Imóveis de arquivo XML</label>
                            <input type="file" name="import" id="import">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Importar">
                    </form>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <hr>
                    
                    <a type="button" class="btn btn-success" href="{{ route('properties.create') }}">
                        Adicionar Imóvel
                    </a>

                    <hr>

                    <div class="table-responsive">
                        <table class="table table-condensed" id="datatable">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Título</th>
                                    <th>Tipo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($properties as $property)
                                <tr>
                                    <td>{{ $property->code }}</td>
                                    <td>{{ $property->title }}</td>
                                    <td>{{ $property->type == 'c' ? 'Casa' : 'Apartamento' }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" title="Editar"
                                            href="{{ route('properties.edit', $property) }}">
                                            E
                                        </a>
                                        <a class="btn btn-sm btn-danger" title="Deletar"
                                            onclick="document.getElementById('delete-form-{{ $property->id }}').submit()">
                                            D
                                        </a>
                                        <form method="POST" accept-charset="UTF-8"
                                            action="{{ route('properties.destroy', $property) }}"
                                            id="delete-form-{{ $property->id }}"
                                        >
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('local-stylesheets')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection

@section('local-scripts')
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function() {
  var table = $('#datatable').DataTable({
    pagingType: 'full_numbers',
    language: {
      "emptyTable":     "Nenhum registro encontrado!",
      "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
      "infoEmpty":      "Showing 0 to 0 of 0 entries",
      "infoFiltered":   "(filtered from _MAX_ total entries)",
      "lengthMenu":     "Mostrar _MENU_ registros",
      "search":         "Buscar:",
      "zeroRecords":    "Nenhum registro encontrado!",
      "paginate": {
          "first":      "<<",
          "last":       ">>",
          "next":       ">",
          "previous":   "<"
      },
    }
  });
});
</script>
@endsection