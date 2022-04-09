<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FrmPersona</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min2.js') }}"></script> 
</head>
<body>
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="span2"></div>
            <div class="span8">
                <center>
                <form  action="/actualizar/{{$notaActualizar->id}}" method="POST">
                    @method('PUT')
                    @csrf
                    <fieldset>
                        <legend><h1>FORMULARIO</h1></legend>
                        <h3>Actualizar datos de Persona {{$notaActualizar->id}}</h3>
                        <label>Nombre</label>
                        <input type="text" id="nombre" name ="nombre" placeholder="nombre"value="{{$notaActualizar->nombre}}" required>
                        <label>Edad</label>
                        <input type="number" id="edad" name ="edad"placeholder="Edad" value="{{$notaActualizar->edad}}" required>
                    </fieldset>
                    <br>
                    <p>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="/" class="btn btn-inverse" >Regresar</a>
                    </p>
                    </form>
                    
                    @if (session('update'))
                    {{-- <p>{{session('update')}}</p> --}}
                    <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Hecho!</h4>
                    {{session('update')}}
                    </div>
                @endif
            </center>
            </div>
            <div class="span2">
            </div>
        </div>
    </div>
</body>
</html>

