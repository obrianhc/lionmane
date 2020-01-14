@extends('headers')

@section('title')
Agenda
@endsection

@section('css-aditional-files')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
@endsection

@section('js-aditional-files')
<script>
    var url = "{{ url('/') }}";
    var last_added = 0;
    var tabla = null;
    var xtelefonos = 0;
    var xcorreos = 0;
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/') }}/js/contacts.js"></script>
@endsection

@section('body-page')
    @parent
    <div class="container">
        <div class="row main justify-content-md-center">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="lista-tab" data-toggle="tab" href="#lista" role="tab" aria-controls="lista" aria-selected="true">Contactos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="nuevo-tab" data-toggle="tab" href="#nuevo" role="tab" aria-controls="nuevo" aria-selected="false">Nuevo</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="nuevo" role="tabpanel" aria-labelledby="nuevo-tab">
                    <div class="card">
                        <div class="card-header">
                            <h5>Nuevo contacto</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" id="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Apellido:</label>
                                <input type="text" id="apellido" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Apodo:</label>
                                <input type="text" id="apodo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Género:</label>
                                <select class="form-control" id="genero">
                                    <option></option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Imagen</label>
                                <input type="file" class="form-control" id="imagen">
                            </div>
                            <div class="form-group">
                                <label>Fecha de nacimiento</label>
                                <input type="date" id="fecha_nac" class="form-control">
                            </div>
                            <div class="form-group">
                                <a href="javascript:addMail();"><img src="{{ url('/') }}/imgs/add.png">Agregar Correo</a>
                                <a href="javascript:addPhone();"><img src="{{ url('/') }}/imgs/add.png">Agregar Teléfono</a>
                            </div>
                            <div id="info_contacto">
                            </div>
                            <div class="form-group">
                                <input type="button" value="Guardar" class="btn btn-primary btn-block" onclick="newContact()">
                                <input type="button" value="Cancelar" class="btn btn-danger btn-block" onclick="clean()">
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="tab-pane fade show active" id="lista" role="tabpanel" aria-labelledby="lista-tab">
                    <div class="card">
                        <div class="card-header">
                            <h5>Contactos</h5>
                        </div>
                        <div class="card-body">
                            <table id="contactos" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Apodo</th>
                                        <th>Cumpleaños</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla_contactos"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection