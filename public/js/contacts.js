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

    $('#contactos tbody').on('click', 'tr', function(){
            var data = tabla.row(this).data();
            console.log(data.DT_RowId);
        }
    );
});

function addMail(){
    xcorreos++;
    var html = '<div class="form-group">';
        html += '<input type="email" class="form-control" id="correo'+xcorreos+'" placeholder="Correo electrónico">';
        html += '<select class="form-control" id="categoria_correo'+xcorreos+'">';
        html += '<option value="Personal">Personal</option>';
        html += '<option value="Trabajo">Trabajo</option>';
        html += '<option value="Otro">Otro</option>';
        html += '</select>';
        html += '</div>';
    $('#info_contacto').append(html);
}

function addPhone(){
    xtelefonos++;
    var html = '<div class="form-group">';
        html += '<input type="email" class="form-control" id="telefono'+xtelefonos+'" placeholder="Número telefónico">';
        html += '<select class="form-control" id="categoria_telefono'+xtelefonos+'">';
        html += '<option value="Principal">Principal</option>';
        html += '<option value="Trabajo">Trabajo</option>';
        html += '<option value="Móvil">Móvil</option>';
        html += '<option value="Otro">Otro</option>';
        html += '</select>';
        html += '</div>';
    $('#info_contacto').append(html);
}

function getMails(idContacto){
    var mails = [];
    if(xcorreos > 0){
        for(var x = 1; x <= xcorreos; x++){
            mails.push({ contacto_id: idContacto, correo: $('#correo'+x).val(), categoria: $('#categoria_correo'+x).val() })
        }
    }
    return mails;
}

function getPhones(idContacto){
    var phones = [];
    if(xtelefonos > 0){
        for(var x = 1; x <= xtelefonos; x++){
            phones.push({ contacto_id: idContacto, numero_de_telefono: $('#telefono'+x).val(), categoria:$('#categoria_telefono'+x).val() })
        }
    }
    return phones;
}

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
                    DT_RowId: response[x].id,
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
            store_contact_info(data.id);
            show_message('El contacto '+data.nombre+' ha sido agregado con éxito.');
            load_contacts();
        },
        error: function(data){
            show_message('Ha ocurido un error, contacte con el administrador.');
        },
    });
}

function store_contact_info(contacto_id){
    telefonos = getPhones(contacto_id);
    correos = getMails(contacto_id);

    for(var x = 0; x < telefonos.length; x++){
        var telefono = telefonos[x];
        $.ajax({
            url: url+'/api/newPhone',
            type: 'post',
            dataType: 'json',
            contentType: 'application/x-www-form-urlencoded',
            data: telefono,
            success: function(data){
                console.log('Telefono: ');
                console.log(data);
            },
            error: function(data){
                console.log('Telefono: ');
                console.log(data);
            }
        });
    }

    for(var x = 0; x < correos.length; x++){
        var correo = correos[x];
        $.ajax({
            url: url+'/api/newEmail',
            type: 'post',
            dataType: 'json',
            contentType: 'application/x-www-form-urlencoded',
            data: correo,
            success: function(data){
                console.log('Correo: ');
                console.log(data);
            },
            error: function(data){
                console.log('Correo: ');
                console.log(data);
            }
        });
    }

    xtelefonos = 0;
    xcorreos = 0;
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
    $('#info_contacto').text("");
    xcorreos = 0;
    xtelefonos = 0;
}