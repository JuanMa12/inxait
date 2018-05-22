@extends('template.home')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Ganador!</h2>
        @if($client != NULL)
          {{ $client->name }}
          @else
          <p>No existen mas de 5 clientes registrados!</p>
        @endif
        <p>
        </p>
        <a href="{{url('/clients')}}" class="btn btn-primary">
          <i class="fa fa-plus"></i> Volver a clientes
        </a>
      </div>
    </div>
  </div>
@endsection
