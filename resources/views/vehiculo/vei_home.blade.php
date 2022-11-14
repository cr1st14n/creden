<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Registro de Vehicular</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header d-block">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <div class="input-group mb-2 mr-sm-4">
                                <div class="input-group-prepend ">
                                    <div class="input-group-text"><i class="fa fa-search"></i></div>
                                </div>
                                <input type="text" class="form-control" onkeyup="input_busqueda_creden(this.value)" placeholder="Buscar por NOMBRE o CI">
                            </div> -->
                            <button style="text-align: rigth ;" type="button" id="btn_newVehiculo"
                                class="btn btn-primary mb-2 "><i class="fa fa-plus-circle"></i> Agregar </button>
                            {{-- <input type="text" class="form-control"> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body p-0 table-border-style">
                    <div class="table-responsive" style="min-height:250px;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align:right">Codigo</th>
                                    <th style="text-align:right">Placa</th>
                                    <th>Responsable</th>
                                    <th width='15%' style="text-align:center"></th>
                                </tr>
                            </thead>
                            <tbody id="view_1_body_vehi">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class=" card-header">
                    <h4>Detalle </h4>
                </div>
                <div class=" card-body" id="detalle_vehiculo_p">
                    <p>
                        Placa: <strong> </strong> <br>
                        Empresa: <strong> </strong><br>
                        Motivo: <strong> </strong><br>
                        Fecha Inicial: <strong> </strong><br>
                        Fecha Final: <strong> </strong><br>
                        ------------- <br>
                        # de Poliza: <strong> </strong><br>
                        Marca: <strong> </strong><br>
                        Tipo: <strong> </strong><br>
                        Color: <strong> </strong><br>
                        Empresa Aseguradora: <strong> </strong><br>
                        ------------- <br>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="md_newVehiculo" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">Registro Vehicular</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" id="form_newVehiculo">@csrf
                        <div class="form-group row ">
                            <div class="col-sm-6">
                                <div class="form-group small">
                                    <select class="form-control" name="vi_emp" id="vi_emp"></select>
                                    <b>Empresa</b>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group small">
                                    <input type="text" class="form-control" name="vi_placa" required>
                                    <b>Placa</b>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group small">
                                    <input type="text" class="form-control" name="vi_poliza">
                                    <b># de Poliza</b>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group small">
                                    <input type="text" class="form-control" name="vi_resp" required>
                                    <b>Responsable</b>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group small">
                                    <input type="text" class="form-control" name="vi_empAse">
                                    <b>Empresa Aseguradora</b>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group small">
                                    <input type="text" class="form-control" name="vi_aut" required>
                                    <b>Autorizado por:</b>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group small">
                                    <input type="date" class="form-control" name="vi_feI" required>
                                    <b>Fecha Inicial</b>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group small">
                                    <input type="date" class="form-control" name="vi_fef" required>
                                    <b>Fecha Final</b>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group small">
                                    <input type="text" class="form-control" name="vi_mo" id="vi_mo">
                                    <b>Motivo</b>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group small">
                                    <select class="form-control" name="vi_color" id="vi_color"></select>
                                    <b>Color de Vehiculo</b>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group small">
                                    <select class="form-control" name="vi_tipo" id="vi_tipo"></select>
                                    <b>Tipo de Vehiculo</b>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group small">
                                    <select class="form-control" name="vi_fab" id="vi_fab"></select>
                                    <b>Fabricante</b>
                                </div>
                            </div>
                            <div class="modal-footer col-sm-12">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="md_show_vin" tabindex="-1" role="dialog"
        aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <embed src="" type="" id="emb_sec_pdf_vin_v" width="900" height="400">
            </div>
        </div>
    </div>
    <!-- modal para delete item -->
    <div class="modal fade" id="md_crevis_deleteConfirm" tabindex="-1" role="dialog"
        aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <p>Confrimar peticion!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary"
                        onclick="destroy_creden_visita(2,0)">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal confirmar renovacion credencial -->
    <div class="modal fade" id="mod_conf_renovacion" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h5 id="text_creden_vigent"> <strong></strong></h5>
                    <hr>
                    <div class="row">
                        <p>Historial de renovaciones.</p>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Motivo</th>
                                        <th>Codigo de Tarjeta</th>
                                    </tr>
                                </thead>
                                <tbody id="table_renov_creden_emp">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <h5>Formulario de renovacion de credencial</h5>
                    <form id="form_ren_cred">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleSelectGender">Motivo</label>
                                    <select class="form-control" id="ren_cred_tipo" name="ren_cred_motivo">
                                        <option value="1">Plataforma</option>
                                        <option value="2">Condución</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleSelectGender">Motivo</label>
                                    <select class="form-control" id="ren_cred_motivo" name="ren_cred_motivo">
                                        <option value="Extravio">Extravio</option>
                                        <option value="Deteriorado">Deteriorado</option>
                                        <option value="Caducado">Caducado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Codigo de nuevo credencial</label>
                                    <input type="number" class="form-control" id="ren_cred_codigo"
                                        name="ren_cred_codigo" placeholder="###">
                                </div>
                            </div>
                        </div>
                        <p>Nota: Una vez confirmado, la renovación estara registrada dentro la base de datos y sera
                            expresada en el futuro credencial con la letra <strong>"D"</strong></p>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="fun_renovar_creden(0,3)" class="btn btn-secondary"
                        data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="fun_renovar_creden(0,2)" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('resources/js/vehiculo/vehiculo_1.js') }}"></script>
