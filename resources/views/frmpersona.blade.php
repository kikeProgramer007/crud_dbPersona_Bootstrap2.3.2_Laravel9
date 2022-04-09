<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FrmPersona</title>
    {{-- BOOTSTRAP 2.3.2 ORIGINAL --}}
    {{-- <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/bootstrap-responsive.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet">


    {{-- DATATABLE responisve NUEVO--> --}}
    {{-- <link href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href=" https://datatables.net/media/blog/bootstrap_2/DT_bootstrap.css" rel="stylesheet"> 
        
    {{-- ORIGINAL JS --}}
    {{-- <script src="{{ asset('js/bootstrap.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min2.js') }}"></script> 
    
    {{-- DATATABLE JS--> --}}
    <script  type="text/javascript" charset="utf-8" language="javascript"src="https://datatables.net/release-datatables/media/js/jquery.js" ></script>
    <script  type="text/javascript" charset="utf-8" language="javascript"src="https://datatables.net/release-datatables/media/js/jquery.dataTables.js" ></script>
    <script  type="text/javascript" charset="utf-8" language="javascript"src="https://datatables.net/media/blog/bootstrap_2/DT_bootstrap.js" ></script>

</head>
<body>
  <style type="text/css">

    /* Sticky footer styles
    -------------------------------------------------- */
    html,
    body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
    }

    /* Wrapper for page content to push down footer */
    #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
    }
    /* Custom page CSS
    -------------------------------------------------- */
    /* Not required for template or sticky footer method. */
        /* .container {
    width: auto;
    max-width: 680px;
    } */
    .container .credit {
        margin: 20px 0;
    } 

  </style>

    <div id="wrap">
        <div class="container" style="margin-top: 20px">
            <center><h1>FORMULARIO</h1></center>
                <a href="#myModal" role="button" class="btn control-group warning" data-toggle="modal"><i class="icon-plus"></i> Nuevo registro</a>
            <center>
                @if (session('agregar'))
                <br>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>Notify</h4>
                        {{session('agregar')}}
                    </div>
                    @else
                        @if (session('delete'))
                        <br>
                        <div class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Notify</h4>
                            {{session('delete')}}
                        </div>
                        @else
                            <br>
                        @endif
                @endif
            </center>
        </div>

        <div class="container">
            <table class="table table-condensed table-bordered table table-hover" ellpadding="0" cellspacing="0" border="0"id="example"style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th >Nombre</th>
                        <th >Edad</th>
                        <th width="7.1%"></th>
                        <th width="8%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personas as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->edad}}</td>
                        <td><a href="/editar/{{$item->id}}"class="btn btn-small"><i class="icon-pencil"></i> Editar</a></td>
                        <td><button type="button" class="btn btn-danger btn-small" data-toggle="modal" data-target='#confirm-delete' onclick="eliminar({{$item->id}})"><i class="icon-trash"></i> Eliminar</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Nuevo Registro</h3>
    </div>
   
    <div class="modal-body">
        <center><h3>Datos de persona</h3></center>
        <form class="form-horizontal"  action="registrar" method="POST">
            @csrf
            <div class="control-group">
                <label class="control-label" for="nombre">Nombre</label>
                <div class="controls">
                    <input type="text" id="nombre" name ="nombre" placeholder="nombre" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="edad">Edad</label>
                <div class="controls">
                    <input type="number" id="edad" name ="edad"placeholder="Edad" required>
                </div>
            </div>
    </div>
    <div class="modal-footer">
            <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
   
</div>

<!-- "MODAL" ES CODIGO EFECTUARA UNA VENTANA DE CONFIRMACION O CANCELACION DEL BOTOM ALIMINAR-->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
            </div>

            <div class="modal-body">
                ¿Desea eliminar este registro?
                <form id="formeliminar" action="" method="POST">
                    @csrf
                    @method('DELETE')
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Confirmar</button>
            </form>
            </div>
        </div>
    </div>
</div>



<script>
    function eliminar(id_item) {
        $('#id_producto').val(id_item);
        $('#formeliminar').attr('action','/eliminar/'+id_item);
    }
</script>

</body>
</html>

