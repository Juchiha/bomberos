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
                    <h1 class="m-0">Usuarios / Bienvenido <?php echo $_SESSION['nombres']; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Usuarios</li>
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
                                <button type="button" data-toggle="modal" data-target="#modalAgregarUsuarios" class="btn btn-tool" title="Agregar Nuevo Usuario">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tablaUsuarios" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">#</th>
                                        <th>Rango</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Estado</th>
                                        <th>U. Login</th> 
                                        <th style="width: 15%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <tr>
                                            <th style="width: 10px;">#</th>
                                            <th>Rango</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Estado</th>
                                            <th>U. Login</th> 
                                            <th style="width: 15%;"></th>
                                        </tr>
                                    </tr>
                                </tfoot>
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
<div id="modalAgregarUsuarios" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <form role="form" id="nuevoUsuario" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Primer Nombre</label>
                                <input class="form-control input-lg" type="text" name="user_primer_nombre_v" placeholder="Ingresar Primer Nombre" required="true">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Segundo Nombre</label>
                                <input class="form-control input-lg" type="text" name="user_segundo_nombre_v" placeholder="Ingresar Segundo Nombre" required="true">
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Primer Apellido</label>
                                <input class="form-control input-lg" type="text" name="user_primer_apellido_v" placeholder="Ingresar Primer Apellido" required="true">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Segundo Apellido</label>
                                <input class="form-control input-lg" type="text" name="user_segundo_apellido_v" placeholder="Ingresar Segundo Apellido" required="true">
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Identificación</label>
                                <input class="form-control input-lg" type="text" name="user_doc_id" placeholder="Ingresar Identificación" required="true">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rango</label>
                                <select class="form-control" name="user_ran_id_i">
                                    <option value="0">Seleccione una opción</option>
                                    <?php 
                                        $bancos = ControladorUtilidades::getData('uti_rangos', null, null);
                                        foreach($bancos as $key => $value){
                                            echo '<option value="'.$value['ran_id_i'].'">'.$value['ran_descripcion_v'].', '.$value['ran_sigla_v'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Titulo</label>
                                <input class="form-control input-lg" type="text" name="user_title_v" placeholder="Ingresar Titulo" required="true">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cargo</label>
                                <input class="form-control input-lg" type="text" name="user_cargo_v" placeholder="Ingresar Cargo" required="true">
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input class="form-control input-lg" type="text" name="user_telephone_v" placeholder="Ingresar Teléfono" required="true">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Correo</label>
                                <input class="form-control input-lg" type="text" name="user_correo_v" placeholder="Ingresar Correo" required="true">
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password del Correo</label>
                                <input class="form-control input-lg" type="text" name="user_psw_mail_v" placeholder="Ingresar Password del Correo" required="true">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password del Usuario</label>
                                <input class="form-control input-lg" type="text" name="user_password_v" placeholder="Ingresar Password del Usuario" required="true">
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Año de Registro</label>
                                <input class="form-control input-lg" type="text" name="user_a_registro" placeholder="Ingresar año de Registro" required="true">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Perfil</label>
                                <select class="form-control" name="user_per_id_i">
                                    <option value="0">Seleccione una opción</option>
                                    <?php 
                                        $bancos = ControladorUtilidades::getData('sys_perfiles', null, null);
                                        foreach($bancos as $key => $value){
                                            echo '<option value="'.$value['per_id_i'].'">'.$value['per_descripcion_v'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Imagen del Usuario</label>
                                <input class="form-control input-lg" type="file" name="user_image_v" placeholder="Ingresar año de Registro" required="true">
                            </div> 
                            <p class="help-block">
                                Peso maximo de la foto 200 MB
                            </p>
                            <img src="views/usuarios/default/anonymous.png" width="100px" class="img-thumbnail previsualizar" id="nuevoVisualizarImagen">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="insertR" id="insertR" value="insertR">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="button" id="GuardarUsuario" class="btn btn-primary">Guardar Perfil</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.Modal -->

<!-- Modal agregar Perfil -->
<div id="modalEditarUsuarios" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <form role="form" id="editarUsuario" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Primer Nombre</label>
                                <input class="form-control input-lg" type="text" name="user_primer_nombre_v" id="user_primer_nombre_v" placeholder="Ingresar Primer Nombre" required="true">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Segundo Nombre</label>
                                <input class="form-control input-lg" type="text" name="user_segundo_nombre_v" id="user_segundo_nombre_v" placeholder="Ingresar Segundo Nombre" required="true">
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Primer Apellido</label>
                                <input class="form-control input-lg" type="text" name="user_primer_apellido_v"  id="user_primer_apellido_v" placeholder="Ingresar Primer Apellido" required="true">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Segundo Apellido</label>
                                <input class="form-control input-lg" type="text" name="user_segundo_apellido_v" id="user_segundo_apellido_v" placeholder="Ingresar Segundo Apellido" required="true">
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Identificación</label>
                                <input class="form-control input-lg" type="text" id="user_doc_id" name="user_doc_id" placeholder="Ingresar Identificación" required="true">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rango</label>
                                <select class="form-control" name="user_ran_id_i" id="user_ran_id_i">
                                    <option value="0">Seleccione una opción</option>
                                    <?php 
                                        $bancos = ControladorUtilidades::getData('uti_rangos', null, null);
                                        foreach($bancos as $key => $value){
                                            echo '<option value="'.$value['ran_id_i'].'">'.$value['ran_descripcion_v'].', '.$value['ran_sigla_v'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Titulo</label>
                                <input class="form-control input-lg" type="text" name="user_title_v" id="user_title_v" placeholder="Ingresar Titulo" required="true">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cargo</label>
                                <input class="form-control input-lg" type="text" id="user_cargo_v" name="user_cargo_v" placeholder="Ingresar Cargo" required="true">
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input class="form-control input-lg" type="text" name="user_telephone_v" id="user_telephone_v" placeholder="Ingresar Teléfono" required="true">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Correo</label>
                                <input class="form-control input-lg" type="text" id="user_correo_v" name="user_correo_v" placeholder="Ingresar Correo" required="true">
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password del Correo</label>
                                <input class="form-control input-lg" type="text" name="user_psw_mail_v" id="user_psw_mail_v" placeholder="Ingresar Password del Correo" required="true">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password del Usuario</label>
                                <input class="form-control input-lg" type="password" name="user_password_v" id="user_password_v" placeholder="Ingresar Password del Usuario" required="true">
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Año de Registro</label>
                                <input class="form-control input-lg" type="text" name="user_a_registro" id="user_a_registro" placeholder="Ingresar año de Registro" required="true">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Perfil</label>
                                <select class="form-control" name="user_per_id_i" id="user_per_id_i"> 
                                    <option value="0">Seleccione una opción</option>
                                    <?php 
                                        $bancos = ControladorUtilidades::getData('sys_perfiles', null, null);
                                        foreach($bancos as $key => $value){
                                            echo '<option value="'.$value['per_id_i'].'">'.$value['per_descripcion_v'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Imagen del Usuario</label>
                                <input class="form-control input-lg" type="file" name="user_image_v" placeholder="Imagen del Usuario" required="true">
                            </div> 
                            <p class="help-block">
                                Peso maximo de la foto 200 MB
                            </p>
                            <img src="views/usuarios/default/anonymous.png" width="100px" class="img-thumbnail previsualizar" id="editarVisualizarImagen">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="editarR" id="editarR" value="editarR">
                    <input type="hidden" name="idUsuario" id="idUsuario">
                    <input type="hidden" name="imagenUsuario" id="imagenUsuario">
                    <input type="hidden" name="passwordUsuario" id="passwordUsuario">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="button" id="EdicionUsuario" class="btn btn-primary">Guardar Perfil</button>
                </div>
            </form>
        </div>
    </div>
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
    Usuarios = {
        insertUsuarios:function(tablaUsuarios){
            var FormInsert = new FormData($("#nuevoUsuario")[0]);
            $.ajax({
                url: 'ajax/usuarios.ajax.php',
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
                    tablaUsuarios.ajax.reload();
                    $("#nuevoUsuario")[0].reset();
                    $("#modalAgregarUsuarios").modal('hide');
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

        updateUsuarios:function(tablaUsuarios){
            var FormUpdate = new FormData($("#editarUsuario")[0]);
            $.ajax({
                url: 'ajax/usuarios.ajax.php',
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
                    tablaUsuarios.ajax.reload();
                    $("#editarUsuario")[0].reset();
                    $("#modalEditarUsuarios").modal('hide');
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

        deleteUsuarios:function(idUsuario, tablaUsuarios){
            $.ajax({
                url: 'ajax/usuarios.ajax.php',
                type  : 'post',
                data: { eliminarR : idUsuario},
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
                    tablaUsuarios.ajax.reload();
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

        getUsuarios:function(idUsuario){
            $.ajax({
                url: 'ajax/usuarios.ajax.php',
                type  : 'post',
                dataType : 'json',
                data: { ID : idUsuario, getDatos :  true},
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
                        
                        $("#user_doc_id").val(data.user_doc_id);
                        $("#user_ran_id_i").val(data.user_ran_id_i).change();
                        $("#user_primer_nombre_v").val(data.user_primer_nombre_v);
                        $("#user_segundo_nombre_v").val(data.user_segundo_nombre_v);
                        $("#user_primer_apellido_v").val(data.user_primer_apellido_v);
                        $("#user_segundo_apellido_v").val(data.user_segundo_apellido_v);
                        $("#user_title_v").val(data.user_title_v);
                        $("#user_cargo_v").val(data.user_cargo_v);
                        $("#user_telephone_v").val(data.user_telephone_v);
                        $("#user_correo_v").val(data.user_correo_v);
                        $("#user_psw_mail_v").val(data.user_psw_mail_v);
                        $("#user_per_id_i").val(data.user_per_id_i);
                        $("#user_a_registro").val(data.user_a_registro);
                        
                        $("#idUsuario").val(data.user_id);
                        $("#imagenUsuario").val(data.user_image_v);
                        $("#passwordUsuario").val(data.user_password_v);
                        $("#editarVisualizarImagen").attr("src", data.user_image_v);
                        
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
        edicion += '<button class="btn btn-primary btn-sm btnActualUsuarios" title="Editar" idUsuario data-toggle="modal" data-target="#modalEditarUsuarios" ><i class="fa fa-edit"></i></button>&nbsp;';
        <?php
            }
            if ($_SESSION['per_elimina_i'] == 1) { 
        ?>
        edicion += '<button class="btn btn-danger btn-sm btnEliminarUsuarios" title="Eliminar" idUsuario ><i class="fa fa-trash"></i></button>';
        <?php
            }
        ?>

        var tablaUsuarios = $('#tablaUsuarios').DataTable({
            "ajax": 'ajax/usuarios.ajax.php?allDatos=true',
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

        $('#tablaUsuarios tbody').on( 'click', 'button', function () {
            var data = tablaUsuarios.row( $(this).parents('tr') ).data();
            $(this).attr("idUsuario", data[6]);
        });

        /* Esta parte es para traer los datos de la edicion */
        $('#tablaUsuarios tbody').on("click", ".btnActualUsuarios", function(){
            var x = $(this).attr('idUsuario');
            Usuarios.getUsuarios(x);
        });

        /*Activar funcionalidad de boton eliminar*/
        $('#tablaUsuarios tbody').on("click", ".btnEliminarUsuarios", function(){
            var x = $(this).attr('idUsuario');
            Swal.fire({
                title: '¿Está seguro de borrar el usuario?',
                text: "¡Si no lo está puede cancelar la accíón!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, Eliminar Registro!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Usuarios.deleteUsuarios(x,tablaUsuarios);
                }
            });      
        });

        $("#GuardarUsuario").click(function(){
            Usuarios.insertUsuarios(tablaUsuarios);
        });

        $("#EdicionUsuario").click(function(){
            Usuarios.updateUsuarios(tablaUsuarios);
        });

    });
</script>
