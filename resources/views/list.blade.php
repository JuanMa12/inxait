@extends('template.home')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Lista de clientes</h2>
        <p>Estos son los clientes registrados:</p>
        <a href="{{url('/')}}" class="btn btn-primary">
          <i class="fa fa-plus"></i> Agregar Cliente
        </a> <hr>
      </div>
      <div class="col-md-2"></div>
      <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Identificación</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                </tr>
                </thead>
                <tbody>
                @if($clients->isEmpty())
                    <tr>
                        <td colspan="6">
                            <div class="alert orange lighten-2 white-text">
                                <strong>Anuncio !</strong>No se encontraron registros.
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach($clients as $client)
                        <tr>
                            <td>
                              {{$client->name}} {{$client->last_name}}
                            </td>
                            <td>
                                {{$client->state()->first()->name_departament}} | {{$client->city()->first()->name_city}}
                            </td>
                            <td>{{$client->identification}}</td>
                            <th>{{$client->phone}}</th>
                            <th>{{$client->email}}</th>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>
  </div>
@endsection
