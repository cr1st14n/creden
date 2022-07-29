<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Registro de credenciales</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-block">
                   <div class="row">

                       <div class="col-lg-1">
                           <button type="button" id="btn_creden_add_item" class="btn btn-primary mb-2 btn-block"><i class="fa fa-plus-circle"></i> Agregar </button>
                       </div>
                       <div class="col-lg-2">
                           <div class="input-group mb-2 mr-sm-4">
                               <div class="input-group-prepend ">
                                   <div class="input-group-text"><i class="fa fa-search"></i></div>
                               </div>
                               <input type="text" class="form-control"  onkeyup="input_busqueda_creden(this.value)" placeholder="Buscar...">
                           </div>
                       </div>
                   </div>
                </div>
                <div class="card-body p-0 table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>C.I.</th>
                                    <th>Empresa</th>
                                    <th>Vencimiento</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="view_1_body_1">
                                @foreach($e as $e)
                                <tr>
                                    <td>{{$e->Codigo}}</td>
                                    <td>{{$e->Nombre}} {{$e->Paterno}} {{$e->Materno}}</td>
                                    <td>{{$e->CI}}</td>
                                    <td>{{$e->NombEmpresa}}</td>
                                    <td>{{date_format(date_create($e->Vencimiento), 'd-m-Y')}}</td>
                                    <td>
                                        <img src="{{asset($e->urlphoto)}}" width="60px" alt="">
                                    </td>
                                    <td>
                                        <div class="">
                                            <button type="button" onclick="fun_credeEmp_edit('{{$e->idEmpleado}}')" class="btn btn-icon btn-dark"><i class="ik ik-edit "></i></button>
                                            <button type="button" onclick="fun_credeEmp_delete('{{$e->idEmpleado}}')" class="btn btn-icon btn-warning"><i class="ik ik-delete"></i></button>
                                            <button type="button" onclick="fun_credeEmp_camera('{{$e->idEmpleado}}')" class="btn btn-icon btn-primary"><i class="ik ik-camera"></i></button>
                                            <button type="button" onclick="fun_credeEmp_emage('{{$e->idEmpleado}}')" class="btn btn-icon btn-success"><i class="ik ik-image"></i></button>
                                            <button type="button" onclick="fun_credeEmp_print('{{$e->idEmpleado}}')" class="btn btn-icon btn-info"><i class="ik ik-printer"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="md_add_credencial" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">Nuevo Credencial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" id="form_new_creden">@csrf
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Tipo de credencial</span>
                                    <select class="form-control" name="nc_tipo">
                                        <option value="N">Nacional</option>
                                        <option value="L">Local</option>
                                        <option value="T">Temporal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Carnet de Identidad</span>
                                    <input type="text" class="form-control" name="nc_ci" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Nombre</span>
                                    <input type="text" class="form-control" name="nc_nom" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Ap. Paterno</span>
                                    <input type="text" class="form-control" name="nc_pa">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Ap. Materno</span>
                                    <input type="text" class="form-control" name="nc_ma">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Empresa</span>
                                    <select class="form-control" id="" name="nc_em">
                                        @foreach($Empr as $e)
                                        <option value="{{ $e->Empresa}}">{{ $e->NombEmpresa}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Cargo</span>
                                    <input type="text" class="form-control" name="nc_car">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Codigo de Tarjeta</span>
                                    <input type="text" class="form-control" name="nc_codt">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Codigo MYFARE</span>
                                    <input type="text" class="form-control" name="nc_codMy">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Herramientas</span>
                                    <input type="text" class="form-control" name="nc_he">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Areas Autorizadas</span>
                                    <input type="text" class="form-control" name="nc_areas_acceso">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Grupo Sanguineo</span>
                                    <input type="text" class="form-control" name="nc_gs">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Fecha de Vencimiento</span>
                                    <input type="date" class="form-control" name="nc_fv">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Acciones</span>
                                    <select class="form-control" name="" id="" name="nc_acci">
                                        <option value="C">Dar de Alta</option>
                                        <option value="S">Credencial Extraviada</option>
                                        <option value="V">Credencial Robada</option>
                                        <option value="D">Dar de Baja</option>
                                        <option value="U">Tramite no Concluido</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Nro. Renovación</span>
                                    <input type="text" class="form-control" name="nc_nren">
                                </div>
                            </div>
                        </div> -->
                        <hr>
                        <h5>Información Adicional</h5>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Fecha de Igreso</span>
                                    <input type="date" class="form-control" name="nc_f_in">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Fecha de Nacimiento</span>
                                    <input type="date" class="form-control" name="nc_FNac">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Estado Civil</span>
                                    <select class="form-control" name="nc_estCiv">
                                        <option value="C">Casado</option>
                                        <option value="S">Soltero</option>
                                        <option value="V">Viudo</option>
                                        <option value="D">Divorsiado</option>
                                        <option value="U">Union Libre</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Sexo</span>
                                    <select class="form-control" name="nc_sexo">
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Profesion</span>
                                    <input type="text" class="form-control" name="nc_pro">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Estatura CM</span>
                                    <input type="number" class="form-control" name="nc_est">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Color de ojos</span>
                                    <input type="text" class="form-control" name="nc_colojo">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Masa Corporal</span>
                                    <input type="number" class="form-control" name="nc_maCorp">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Fono Domicilio</span>
                                    <input type="text" class="form-control" name="nc_Fono">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <span>Dirección Domicilio</span>
                                    <input type="text" class="form-control" name="nc_10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Fono Trabajo</span>
                                    <input type="text" class="form-control" name="nc_11">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <span>Dirección Trabajo</span>
                                    <input type="text" class="form-control" name="nc_12">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-12">
                                <span>Observaciones</span>
                                <input type="text" class="form-control" name="nc_13">
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
    <div class="modal fade" id="md_update_credencial" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">Nuevo Credencial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" id="form_update_creden">@csrf
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Tipo de credencial</span>
                                    <select class="form-control" name="nc_tipo_edit">
                                        <option value="N">Nacional</option>
                                        <option value="L">Local</option>
                                        <option value="T">Temporal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Carnet de Identidad</span>
                                    <input type="text" class="form-control" name="nc_ci_edit">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Nombre</span>
                                    <input type="text" class="form-control" name="nc_nom_edit">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Ap. Paterno</span>
                                    <input type="text" class="form-control" name="nc_pa_edit">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Ap. Materno</span>
                                    <input type="text" class="form-control" name="nc_ma_edit">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Empresa</span>
                                    <select class="form-control" id="nc_em_edit_id" name="nc_em_edit">
                                        @foreach($Empr as $e)
                                        <option value="{{$e->Empresa}}">{{ $e->NombEmpresa}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Cargo</span>
                                    <input type="text" class="form-control" name="nc_car_edit">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Codigo de Tarjeta</span>
                                    <input type="text" class="form-control" name="nc_codt_edit">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Codigo MYFARE</span>
                                    <input type="text" class="form-control" name="nc_codMy_edit">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Herramientas</span>
                                    <input type="text" class="form-control" name="nc_he_edit">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Areas Autorizadas</span>
                                    <input type="text" class="form-control" name="nc_areas_acceso_edit">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Grupo Sanguineo</span>
                                    <input type="text" class="form-control" name="nc_gs_edit">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Fecha de Vencimiento</span>
                                    <input type="date" class="form-control" name="nc_fv_edit">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Acciones</span>
                                    <select class="" name="" id="" name="nc_acci_edit">
                                        <option value="C">Dar de Alta</option>
                                        <option value="S">Credencial Extraviada</option>
                                        <option value="V">Credencial Robada</option>
                                        <option value="D">Dar de Baja</option>
                                        <option value="U">Tramite no Concluido</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Nro. Renovación</span>
                                    <input type="text" class="form-control" name="nc_nren_edit">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Información Adicional</h5>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Fecha de Igreso</span>
                                    <input type="date" class="form-control" name="nc_f_in_edit">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Fecha de Nacimiento</span>
                                    <input type="date" class="form-control" name="nc_FNac_edit">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Estado Civil</span>
                                    <select class="form-control" name="nc_estCiv_edit">
                                        <option value="C">Casado</option>
                                        <option value="S">Soltero</option>
                                        <option value="V">Viudo</option>
                                        <option value="D">Divorsiado</option>
                                        <option value="U">Union Libre</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Sexo</span>
                                    <select class="form-control" name="nc_sexo_edit">
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Profesion</span>
                                    <input type="text" class="form-control" name="nc_pro_edit">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Estatura CM</span>
                                    <input type="number" class="form-control" name="nc_est_edit">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Color de ojos</span>
                                    <input type="text" class="form-control" name="nc_colojo_edit">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Masa Corporal</span>
                                    <input type="number" class="form-control" name="nc_maCorp_edit">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Fono Domicilio</span>
                                    <input type="text" class="form-control" name="nc_Fono_edit">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <span>Dirección Domicilio</span>
                                    <input type="text" class="form-control" name="nc_10_edit">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span>Fono Trabajo</span>
                                    <input type="text" class="form-control" name="nc_11_edit">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <span>Dirección Trabajo</span>
                                    <input type="text" class="form-control" name="nc_12_edit">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-12">
                                <span>Observaciones</span>
                                <input type="text" class="form-control" name="nc_13_edit">
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
    <!-- modals -->
    <div class="modal fade" id="md_add_photo" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">Cargar imagen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="panel-body" id="myId" style="padding: 0;">
                        <form id="subImagen" class="dropzone">
                            <input type="text" id="textRX1" name="rxfactura" hidden>
                            <input type="text" id="textRX2" name="rxmedicoTratante" hidden>
                            <input type="text" id="textRX3" name="rxDescImagen" hidden>
                            <div class="fallback" id="2121">
                                <input name="file" type="file" multiple />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="md_show_credencial" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <embed src="" type="" id="emb_sec_pdf_creden" width="1000" height="800">
            </div>
        </div>
    </div>
    <!-- modal para delete item -->
    <div class="modal fade" id="md_show_deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <p>Confrimar peticion!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="destroy_credencial()">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('resources/js/credenciales.js')}}"></script>