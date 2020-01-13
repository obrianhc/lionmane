$(function(){    
    tabla = $('#contactos')
    .addClass('nowrap')
    .DataTable({
        responsive: true,
        columns:[
            {data: 'nombre'},
            {data: 'apellido'},
            {data: 'apodo'},
            {data: 'cumpleanos'},
            {data: 'correo'},
            {data: 'telefono'},
        ],
        columnDefs: [
            { targets: [-1, -3], className: 'dt-body-right' }
        ]
    });
    load_contacts();
});

function load_contacts(){
    tabla.clear();
    $.ajax({
        url: url+'/api/contacts',
        type: 'get',
        contentType: 'application/x-www-form-urlencoded',
        success: function(response){
            var x = 0;
            for(x = 0; x < response.length; x++){
                tabla.row.add({
                    nombre: response[x].nombre,
                    apellido: response[x].apellido,
                    apodo: response[x].apodo,
                    cumpleanos: response[x].fecha_nac,
                    correo: (response[x].correos.length>0?response[x].correos[0].correo:null),
                    telefono: (response[x].telefonos.length>0?response[x].telefonos[0].numero_de_telefono:null),
                });
            }
            tabla.draw();
        },
        error: function(data){
            show_message('Ha ocurrido un error al carga la información de los contactos');
        }
    });
}

function newContact(){
    var foto = new FormData();
    foto = $('#imagen')[0].files[0];
    
    var contact_params = {
        nombre: $('#nombre').val(),
        apellido: $('#apellido').val(),
        apodo: $('#apodo').val(),
        genero: $('#genero').val(),
        fecha_nac: $('#fecha_nac').val(),
    };

    $.ajax({
        url: url+'/api/newContact',
        type: 'post',
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        data: contact_params,
        success: function(data){
            show_message('El contacto '+data.nombre+' ha sido agregado con éxito.');
            load_contacts();
            last_added = data.id;
        },
        error: function(data){
            show_message('Ha ocurido un error, contacte con el administrador.');
        },
    });
}

function show_message(texto){
    $('#mensaje').text(texto);
    $('#modal').modal('toggle');
}

function clean(){
    $('#nombre').val("");
    $('#apellido').val("");
    $('#apodo').val("");
    $('#imagen').val("");
    $('#genero').val("");
    $('#fecha_nac').val("");
}