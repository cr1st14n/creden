<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Empresas;
use App\Models\Marca;
use App\Models\Tipo;
use App\Models\Vehiculo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class vehiculoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view_1()
    {
        return view('vehiculo.vei_home');
    }
    public function query_list1()
    {
        return Vehiculo::select('id','Placa','Responsable',)->get();
    }
    public function query_detalle_1(Request $request)
    {
        return Vehiculo::where('id',$request->input('id'))->first();
    }
    public function create_1()
    {
        $emp = Empresas::select('Empresa', 'NombEmpresa')->get();
        $color = Color::get();
        $tipo = Tipo::get();
        $marca = Marca::get();

        return ['emp' => $emp, 'color' => $color, 'tipo' => $tipo, 'marca' => $marca,];
    }
    public function store_1(Request $request)
    {
        $new = new Vehiculo;
        $new->Empresa = $request->input('vi_emp');
        $new->Placa = $request->input('vi_placa');
        $new->NroPoliza = $request->input('vi_poliza');
        $new->Responsable = $request->input('vi_resp');
        $new->EmpresaAseg = $request->input('vi_empAse');
        $new->FechaIniPer =Carbon::parse($request->input('vi_feI'))->format('Y-d-m H:i:s');
        $new->FechaFinPer =Carbon::parse($request->input('vi_fef'))->format('Y-d-m H:i:s');
        $new->FechaSolic = Carbon::now()->format('Y-d-m H:i:s');
        $new->Motivo = $request->input('vi_mo');
        $new->AutorizadoPor = $request->input('vi_aut');
        $new->Color = $request->input('vi_color');
        $new->Tipo = $request->input('vi_tipo');
        $new->Marca = $request->input('vi_fab');
        $new->ca_cod_usu=Auth::user()->id;
        $new->Vicom="0";
        $new->Banderola="0";
        $new->Estado=1;
        // $new->created_at=Carbon::now()->format('Y-d-m H:i:s');
        $re = $new->save();
        return $re;

    }
}
