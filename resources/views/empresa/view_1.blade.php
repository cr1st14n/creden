<div class=" col-md-12">
    <div class="card table-card">
        <div class="card-header">
            <h3>Registro de Empresas</h3>
            <div class="card-header-right">
                <!-- <button class="btn btn-facebook" id="btn_modalAdd_user">+</button>
                <input type="text" class="form-control"> -->
                <form class="form-inline">
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-search"></i></div>
                        </div>
                        <input type="text" class="form-control"  onkeyup="inp_buscar_empr(this.value)" placeholder="...">
                    </div>
                    <button type="button" class="btn btn-primary mb-2" id="btn_new_empresa">Nuevo <i class="fa fa-plus"></i></button>
                </form>
            </div>

        </div>
        <div class="card-block">
            <div class="table-responsive">
                <table class="table table-hover mb-0 without-header">
                    <tbody id="table_list_body_1">
                        <tr>
                            <td>
                                <div class="d-inline-block align-middle">
                                    <div class="d-inline-block">
                                        <h6 class="mb-0">Nombre </h6>
                                        <p class="text-muted mb-0">Cod Usuario</p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-right">
                                <h6 class="fw-700">Aeropuerto</h6>
                            </td>
                            <td class="text-right">
                                <h6 class="fw-700">Fecha Ingreso</h6>
                            </td>

                            <td class="text-right">
                                <a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                <a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- top contact and member performance end -->

<div class="modal fade" id="mod_new_empresa" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Registrar Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="form_new_empresa">@csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <span>Nombre</span>
                                <input type="text" class="form-control" name="Emp_nombre" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <span>Abreviacion</span>
                                <input type="text" class="form-control" name="Emp_abreviacion" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <span>Telefono</span>
                                <input type="text" class="form-control" name="Emp_telf" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <span>Dirección</span>
                                <input type="text" class="form-control" name="Emp_dir" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <span>Representante Legal</span>
                                <input type="text" class="form-control" name="Emp_repLeg" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <span>Casilla</span>
                                <input type="text" class="form-control" name="Emp_casi" autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <span>Fax</span>
                                <input type="text" class="form-control" name="Emp_fax" autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <span>Email</span>
                                <input type="text" class="form-control" name="Emp_email" autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <span>Ruc</span>
                                <input type="text" class="form-control" name="Emp_ruc" autocomplete="off" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal delete users -->
<div class="modal fade" id="md_delete_user" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Confirmar Petición !</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" onclick="destroy_user()">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('resources/js/empresa/empresa_1.js')}}"></script>