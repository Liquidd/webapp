<div class="container">
    <button class="btn btn-success btn_modal" data-toggle="modal" data-target="#modal">NUEVO USUARIO</button>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>USER NAME</th>
                    <th>PASSWORD</th>
                    <th>ROLE</th>
                    <th>OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as $value){?>
                    <tr>
                        <th><?php echo $value['id_usuario'];?></th>
                        <td><?php echo $value['username'];?></td>
                        <td><?php echo $value['password'];?></td>
                        <td><?php echo $value['permisos'];?></td>
                        <td>
                            <button type="button" class="btn btn-outline-info vista_productos" data-toggle="modal" data-id='<?php echo $value['id_usuario'];?>' data-target="#modal"><i class="fas fa-sync"></i></button>
                            <?php if ($value["estado"] <= 0) {?>
                                <button type="button" class="btn btn-outline-success btn_estado" data-estado='<?php echo $value['estado'];?>' data-id='<?php echo $value['id_usuario'];?>'>
                                    <i class="fas fa-user-check"></i>
                                </button>
                            <?php } else{?>
                                <button type="button" class="btn btn-outline-danger btn_estado" data-estado='<?php echo $value['estado'];?>' data-id='<?php echo $value['id_usuario'];?>'>
                                    <i class="fas fa-trash"></i>
                                </button>
                            <?php }?>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal NUEVO PRODUCTO-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="header_modal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label for="producto_nombre">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Ingresa el Nombre">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="marca_producto">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Ingresa la Contraseña">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <select class="custom-select" id="id_permisos">
                        <option selected>Tipo de Usuario</option>
                        <option>ADMIN</option>
                        <option>USER_OPERACIONES</option>
                    </select>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn btn-success btn_guardar">GUARDAR</button>
        <button type="button" class="btn btn btn-primary btn_editar">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>