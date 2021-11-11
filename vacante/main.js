$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Oferta");            
    $("#modalCRUD").modal("show");        
    id_vacante=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id_vacante = parseInt(fila.find('td:eq(0)').text());
    descripcion = fila.find('td:eq(1)').text();
    salario = fila.find('td:eq(2)').text();
    id_cargo = parseInt(fila.find('td:eq(3)').text());
    fecha_creacion = parseInt(fila.find('td:eq(4)').text());
    fecha_cierre = parseInt(fila.find('td:eq(5)').text());
    
    $("#descripcion").val(descripcion);
    $("#salario").val(salario);
    $("#id_cargo").val(id_cargo);
    $("#fecha_creacion").val(fecha_creacion);
    $("#fecha_cierre").val(fecha_cierre);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Oferta");            
    $("#modalCRUD").modal("show");  
    var respuesta = Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: 'se actualizo correctamente los datos del id: '+id_vacante+''
      });
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id_vacante = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: 'se elimino correctamente el registro con id: '+id_vacante+''
      });
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id_vacante:id_vacante},
            success: function(){
                tablaPersonas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formPersonas").submit(function(e){
    e.preventDefault();    
    descripcion = $.trim($("#descripcion").val());
    salario = $.trim($("#salario").val());
    id_cargo = $.trim($("#id_cargo").val()); 
    fecha_creacion = $.trim($("#fecha_creacion").val());    
    fecha_cierre = $.trim($("#fecha_cierre").val());       
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {descripcion:descripcion, salario:salario, id_cargo:id_cargo, fecha_creacion:fecha_creacion, fecha_cierre:fecha_cierre, id_vacante:id_vacante, opcion:opcion},
        success: function(data){  
            console.log(data);
            id_vacante = data[0].id_vacante;            
            descripcion = data[0].descripcion;
            salario = data[0].salario;
            id_cargo = data[0].id_cargo;
            fecha_creacion = data[0].fecha_creacion;
            fecha_cierre = data[0].fecha_cierre;
            if(opcion == 1){tablaPersonas.row.add([id_vacante,descripcion,salario, id_cargo, fecha_creacion, fecha_cierre,]).draw();}
            else{tablaPersonas.row(fila).data([id_vacante,descripcion,salario, id_cargo, fecha_creacion, fecha_cierre,]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});