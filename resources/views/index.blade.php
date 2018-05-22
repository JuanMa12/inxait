@extends('template.home')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Registro</h2>
        <p>Registrate y podras ser el ganador!</p>
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-6">

        <form class="" action="{{ url('/clients') }}" method="post">
          {{ csrf_field() }}
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Nombres</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Departamento</label>
              <select name="state" id="state" class="form-control" required>
                <option disabled selected>Seleccione el departamento...</option>
                @foreach($states as $state)
                  <option value="{{ $state->id }}"> {{ $state->name_departament }} </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="">Identificación</label>
              <input type="number" name="identification" class="form-control" required>
              @if ($errors->has('identification'))
                 <span class="help-block">
                   <strong>{{ $errors->first('identification') }}</strong>
                 </span>
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Apellidos</label>
              <input type="text" name="last_name" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Ciudad</label>
              <select name="city" id="city" class="form-control" required>
              </select>
            </div>
            <div class="form-group">
              <label for="">Telefono</label>
              <input type="number" name="phone" class="form-control" required>
              @if ($errors->has('phone'))
                 <span class="help-block">
                   <strong>{{ $errors->first('phone') }}</strong>
                 </span>
              @endif
            </div>
          </div>
          <div class="col-md-12 text-center">
            <div class="form-group">
              <label for="">Correo</label>
              <input type="text" name="email" class="form-control" required>
              @if ($errors->has('email'))
                 <span class="help-block">
                   <strong>{{ $errors->first('email') }}</strong>
                 </span>
              @endif
            </div>
            <div class="form-group">
              <input type="checkbox"  required>
                "Autorizo el tratamiento de mis datos de acuerdo con la finalidad
              establecida en la política de protección de datos personales".
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>

      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script type="text/javascript">
  $("#state").change(function() {
    var id = $("#state").val();
    $('#city option').remove();
      $.ajax({
          type : 'GET',
          url : '/cities/'+id,
          dataType : "json",
          success : function(data){
              var cities = data.cities;
              var text= "";
              $("#city").append("<option selected disabled>Seleccione..</option>");
              console.log(cities.length);
              for (i = 0; i < cities.length; i++) {
                  $("#city").append('<option value='+cities[i].id+'>'+cities[i].name_city+'</option>');
              }
          },
      });
  });

</script>
@endsection
