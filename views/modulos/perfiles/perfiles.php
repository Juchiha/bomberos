<link rel="stylesheet" href="views/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="views/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="views/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="views/assets/plugins/toastr/toastr.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Configuracion / Perfiles del Sistema</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Perfiles</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Usuarios Registrados del sistema</h3>
                            <div class="card-tools">
                                <?php 
                                    if ($_SESSION['per_adiciona_i'] == 1) {     
                                ?>
                                <button type="button" data-toggle="modal" 
                                data-target="#modalAgregarPerfiles" class="btn btn-tool" title="Agregar Nuevo Perfil">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <?php 
                                }
                                ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table style="width: 100%;" id="tbl_Perfils" class="table table-bordered table-striped dt-responsive tablas">  
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">#</th>
                                        <th style="width: 80%;">Nombre</th>
                                        <th style="text-align: center;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>      
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- Modal agregar Perfil -->
<div id="modalAgregarPerfiles" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form role="form" id="nuevoPerfil" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo Perfil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nombre Del Perfil</label>
                                <input class="form-control input-lg" type="text" name="NuevoNombre" placeholder="Ingresar nombre" required="true">
                            </div> 
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Permisos para este perfil</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                            <?php
                                    $tabla_ = "sys_menus";
                                    $reportes = ControladorPerfiles::getData($tabla_,null, null);
                                    foreach ($reportes as $key => $value) {
                                       echo '<div class="col-md-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="NuevoMenusPerfil[]" value="'.$value['menus_id_i'].'"> '.$value['menus_nombre_v'].'
                                                </label>
                                            </div>
                                        </div>';
                                    }
                                ?> 
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Este perfil puede</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="NuevoAdicionar" value="1"> Adicionar
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="NuevoEditar" value="1"> Editar
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="NuevoEliminar" value="1"> Eliminar
                                        </label>
                                    </div>
                                </div>                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="insertR" id="insertR" value="insertR">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="button" id="GuardarPerfil" class="btn btn-primary">Guardar Perfil</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.Modal -->

<!-- Modal editar Perfil -->
<div id="modalEditarPerfiles" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form role="form" method="post" id="EditarPerfilFormulario" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Perfil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nombre Del Perfil</label>
                                <input class="form-control input-lg" type="text" name="EditarNombre" id="EditarNombre" placeholder="Ingresar nombre" required="true">
                            </div> 
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Permisos para este perfil</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                            <?php
                                    $tabla_ = "sys_menus";
                                    $reportes = ControladorPerfiles::getData($tabla_,null, null);
                                    foreach ($reportes as $key => $value) {
                                       echo '<div class="col-md-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="EditarMenusPerfil[]" id="'.$value['menus_id_i'].'" class="checkboxMenu" value="'.$value['menus_id_i'].'"> '.$value['menus_nombre_v'].'
                                                </label>
                                            </div>
                                        </div>';
                                    }
                                ?> 
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Este perfil puede</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="EditarAdicionar" id="EditarAdicionar"  value="1"> Adicionar
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="EditarEditar"  id="EditarEditar"  value="1"> Editar
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="EditarEliminar" id="EditarEliminar"  value="1"> Eliminar
                                        </label>
                                    </div>
                                </div>                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idPerfilEdicion" id="idPerfilEdicion">
                    <input type="hidden" name="editarR" id="editarR" value="editarR">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="button" id="EditarPerfil" class="btn btn-primary">Guardar Perfil</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.Modal -->
</div>
<!-- /.Modal -->
<script src="views/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="views/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="views/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="views/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="views/assets/plugins/blockui/blockUi.js"></script>
<script src="views/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="views/assets/plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    Perfiles = {
        insertPerfiles:function(dataTablesPerfil){
            var FormInsert = new FormData($("#nuevoPerfil")[0]);
            $.ajax({
                url: 'ajax/perfiles.ajax.php',
                type  : 'post',
                data: FormInsert,
                dataType : 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $.blockUI({ 
                        message : '<h3>Un momento por favor....</h3>',
                        baseZ: 2000,
                        css: { 
                            border: 'none', 
                            padding: '1px', 
                            backgroundColor: '#000', 
                            '-webkit-border-radius': '10px', 
                            '-moz-border-radius': '10px', 
                            opacity: .5, 
                            color: '#fff' 
                        } 
                    }); 
                },
                complete:function(){
                    $.unblockUI();
                },
                //una vez finalizado correctamente
                success: function(data){
                    if(data.code == 0){
                        Toast.fire({
                            icon: 'error',
                            title: 'Proceso terminado, '+data.message
                        })
                    }else{
                        Toast.fire({
                            icon: 'success',
                            title: 'Proceso terminado, '+data.message
                        })
                    }
                    dataTablesPerfil.ajax.reload();
                    $("#nuevoPerfil")[0].reset();
                    $("#modalAgregarPerfiles").modal('hide');
                },
                //si ha ocurrido un error
                error: function(){
                    Toast.fire({
                        icon: 'error',
                        title: 'Error al realizar el proceso'
                    })
                }
            });
        },

        updatePerfiles:function(dataTablesPerfil){
            var FormUpdate = new FormData($("#EditarPerfilFormulario")[0]);
            $.ajax({
                url: 'ajax/perfiles.ajax.php',
                type  : 'post',
                data: FormUpdate,
                dataType : 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $.blockUI({ 
                        message : '<h3>Un momento por favor....</h3>',
                        baseZ: 2000,
                        css: { 
                            border: 'none', 
                            padding: '1px', 
                            backgroundColor: '#000', 
                            '-webkit-border-radius': '10px', 
                            '-moz-border-radius': '10px', 
                            opacity: .5, 
                            color: '#fff' 
                        } 
                    }); 
                },
                complete:function(){
                    $.unblockUI();
                },
                //una vez finalizado correctamente
                success: function(data){
                    if(data.code == 0){
                        Toast.fire({
                            icon: 'error',
                            title: 'Proceso terminado, '+data.message
                        })
                    }else{
                        Toast.fire({
                            icon: 'success',
                            title: 'Proceso terminado, '+data.message
                        })
                    }
                    dataTablesPerfil.ajax.reload();
                    $("#EditarPerfilFormulario")[0].reset();
                    $("#modalEditarPerfiles").modal('hide');
                },
                //si ha ocurrido un error
                error: function(){
                   Toast.fire({
                        icon: 'error',
                        title: 'Error al realizar el proceso'
                    })
                }
            });
        },

        deletePerfiles:function(idPerfil, dataTablesPerfil){
            $.ajax({
                url: 'ajax/perfiles.ajax.php',
                type  : 'post',
                data: { eliminarR : idPerfil},
                dataType : 'json',
                beforeSend:function(){
                    $.blockUI({ 
                        message : '<h3>Un momento por favor....</h3>',
                        baseZ: 2000,
                        css: { 
                            border: 'none', 
                            padding: '1px', 
                            backgroundColor: '#000', 
                            '-webkit-border-radius': '10px', 
                            '-moz-border-radius': '10px', 
                            opacity: .5, 
                            color: '#fff' 
                        } 
                    }); 
                },
                complete:function(){
                    $.unblockUI();
                },
                //una vez finalizado correctamente
                success: function(data){
                    if(data.code == 0){
                        Toast.fire({
                            icon: 'error',
                            title: 'Proceso terminado, '+data.message
                        })
                    }else{
                        Toast.fire({
                            icon: 'success',
                            title: 'Proceso terminado, '+data.message
                        })
                    }
                    dataTablesPerfil.ajax.reload();
                },
                //si ha ocurrido un error
                error: function(){
                    Toast.fire({
                        icon: 'error',
                        title: 'Error al realizar el proceso'
                    })
                }
            });
        },

        getPerfiles:function(idPerfil){
            $.ajax({
                url: 'ajax/perfiles.ajax.php',
                type  : 'post',
                dataType : 'json',
                data: { ID : idPerfil, getDatos :  true},
                beforeSend:function(){
                    $.blockUI({ 
                        message : '<h3>Un momento por favor....</h3>',
                        baseZ: 2000,
                        css: { 
                            border: 'none', 
                            padding: '1px', 
                            backgroundColor: '#000', 
                            '-webkit-border-radius': '10px', 
                            '-moz-border-radius': '10px', 
                            opacity: .5, 
                            color: '#fff' 
                        } 
                    });  
                },
                complete:function(){
                    $.unblockUI();
                },
                //una vez finalizado correctamente
                success: function(data){
                    if(data != false){
                        
                        $("#EditarNombre").val(data.datosPerfil.per_descripcion_v);
                        if(data.datosPerfil.per_adiciona_i == 1){
                            $("#EditarAdicionar").attr('checked', true);    
                        }else{
                            $("#EditarAdicionar").attr('checked', false);    
                        }

                        if(data.datosPerfil.per_edita_i == 1){
                            $("#EditarEditar").attr('checked', true);    
                        }else{
                            $("#EditarEditar").attr('checked', false);
                        }

                        if(data.datosPerfil.per_elimina_i == 1){
                            $("#EditarEliminar").attr('checked', true);    
                        }else{
                            $("#EditarEliminar").attr('checked', false);
                        }
    
                        $("#idPerfilEdicion").val(data.datosPerfil.per_id_i);
                        $(".checkboxMenu").attr('checked', false);
                        $.each(data.DatosMenus, function(i, item){
                            console.log(item);
                            $("#"+item.pem_men_id_i).attr('checked', true);
                        });
                    }
                },
                //si ha ocurrido un error
                error: function(){
                    Toast.fire({
                        icon: 'error',
                        title: 'Error al realizar el proceso'
                    })
                }
            });
        }
    }

    $(function(){

        let edicion = '';
        <?php 
            if ($_SESSION['per_edita_i'] == 1) {     
        ?>
        edicion += '<button class="btn btn-primary btn-sm btnActualPerfiles" title="Editar" idPerfil data-toggle="modal" data-target="#modalEditarPerfiles" ><i class="fa fa-edit"></i></button>&nbsp;';
        <?php
            }
            if ($_SESSION['per_elimina_i'] == 1) { 
        ?>
        edicion += '<button class="btn btn-danger btn-sm btnEliminarPerfiles" title="Eliminar" idPerfil ><i class="fa fa-trash"></i></button>';
        <?php
            }
        ?>

        var dataTablesPerfil = $('#tbl_Perfils').DataTable({
            "ajax": 'ajax/perfiles.ajax.php?allDatos=true',
            "columnDefs": [
                {
                    "targets": -1,
                    "data": null,
                    "className": "text-center",
                     render: {
                        display: function (data, type, row) {
                            return edicion;
                        }
                    }
                }
            ],
            "language" : {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando de _START_ a _END_ de _TOTAL_",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });

        $('#tbl_Perfils tbody').on( 'click', 'button', function () {
            var data = dataTablesPerfil.row( $(this).parents('tr') ).data();
            $(this).attr("idPerfil", data[2]);
        });

        /* Esta parte es para traer los datos de la edicion */
        $('#tbl_Perfils tbody').on("click", ".btnActualPerfiles", function(){
            var x = $(this).attr('idPerfil');
            Perfiles.getPerfiles(x);
        });

        /*Activar funcionalidad de boton eliminar*/
        $('#tbl_Perfils tbody').on("click", ".btnEliminarPerfiles", function(){
            var x = $(this).attr('idPerfil');
            Swal.fire({
                title: '¿Está seguro de borrar el Familia?',
                text: "¡Si no lo está puede cancelar la accíón!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, Eliminar Registro!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Perfiles.deletePerfiles(x,dataTablesPerfil);
                }
            });      
        });

        $("#GuardarPerfil").click(function(){
            Perfiles.insertPerfiles(dataTablesPerfil);
        });

        $("#EditarPerfil").click(function(){
            Perfiles.updatePerfiles(dataTablesPerfil);
        });

    });
</script>