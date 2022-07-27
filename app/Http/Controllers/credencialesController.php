<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Empresas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// use Barryvdh\DomPDF\Facade\Pdf as PDF;
use PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class credencialesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view_1()
    {
        switch (Auth::User()->aeropuerto) {
            case 'LP':
                $aero = 'LPB';
                break;
            case 'CB':
                $aero = 'CBB';
                break;
            case 'SC':
                $aero = 'VVI';
                break;

            default:
                # code...
                break;
        }
        $em = Empleados::where('aeropuerto', $aero)
            ->join('Empresas', 'Empresas.Empresa', 'Empleados.Empresa')
            ->select(
                'Empleados.idEmpleado',
                'Empleados.Codigo',
                'Empleados.Nombre',
                'Empleados.Paterno',
                'Empleados.Materno',
                'Empleados.CI',
                'Empleados.urlphoto',
                'Empleados.FechaVencCP',
                'Empresas.NombEmpresa'
            )
            ->orderBy('codigo', 'asc')
            ->get();
        $empresas = Empresas::get();
        return view('credenciales.view_1')->with('Empr', $empresas)->with('e', $em);
    }
    public function queryCreate_1(Request $request)
    {

        switch (Auth::User()->aeropuerto) {
            case 'LP':
                $aero = 'LPB';
                break;
            case 'CB':
                $aero = 'CBB';
                break;
            case 'SC':
                $aero = 'VVI';
                break;

            default:
                # code...
                break;
        }
        $new = new Empleados();
        // codigo
        // $new->Codigo = $request->input('nc_cod');
        $new->Codigo = intval(Empleados::where('aeropuerto',$aero)->max('Codigo')) +1;

        $new->tipo = $request->input('nc_tipo');
        $new->CI = $request->input('nc_ci');
        $new->Nombre = $request->input('nc_nom');
        $new->Paterno = $request->input('nc_pa');
        $new->Materno = $request->input('nc_ma');
        $new->Empresa = $request->input('nc_em');
        $new->Cargo = $request->input('nc_car');
        $new->CodigoTarjeta = $request->input('nc_codt');
        $new->CodMYFARE = $request->input('nc_codMy');
        $new->NroRenovacion = 0;
        $new->Herramientas = $request->input('nc_he');
        $new->AreasAut = $request->input('nc_areas_acceso');
        $new->GSangre = $request->input('nc_gs');
        $new->Vencimiento = Carbon::parse($request->input('nc_fv'))->format('Y-d-m H:i:s');
        $new->aeropuerto = $aero;
        $new->estado = $request->input('nc_acci');
        $new->Fecha = Carbon::parse($request->input('nc_f_in'))->format('Y-d-m H:i:s');
        $new->FechaNac =  Carbon::parse($request->input('nc_FNac'))->format('Y-d-m H:i:s');
        $new->EstCivil = $request->input('nc_estCiv');
        $new->Sexo = $request->input('nc_sexo');
        $new->Profesion = $request->input('nc_pro');
        $new->altura = $request->input('nc_est');
        $new->Ojos = $request->input('nc_colojo');
        $new->Peso = $request->input('nc_maCorp');
        $new->TelDom = $request->input('nc_Fono');
        $new->Direccion = $request->input('nc_10');
        $new->TelTrab = $request->input('nc_11');
        $new->DirTrab = $request->input('nc_12');
        $new->Observacion = $request->input('nc_13');

        $res = $new->save();
        return $res;
    }

    public function queryShow_1()
    {
        switch (Auth::User()->aeropuerto) {
            case 'LP':
                $aero = 'LPB';
                break;
            case 'CB':
                $aero = 'CBB';
                break;
            case 'SC':
                $aero = 'VVI';
                break;

            default:
                # code...
                break;
        }
        return Empleados::where('aeropuerto', $aero)
            ->join('Empresas', 'Empresas.Empresa', 'Empleados.Empresa')
            ->select(
                'Empleados.idEmpleado',
                'Empleados.Codigo',
                'Empleados.Nombre',
                'Empleados.Paterno',
                'Empleados.Materno',
                'Empleados.CI',
                'Empleados.urlphoto',
                'Empleados.FechaVencCP',
                'Empresas.NombEmpresa'
            )
            ->orderBy('codigo', 'asc')
            ->get();
    }
    public function query_add_photo(Request $request, $e)
    {
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);
        $imagenes = $request->file('file')->store('public/imagenes');
        $url = Storage::url($imagenes);
        return $res = Empleados::where('idEmpleado', $e)->update(['urlphoto' => 'public' . $url]);
    }

    // * formato de credencial
    public function pdf_creden_emp_a($e, $c)
    {
        $data = Empleados::where('idEmpleado', $e)->select('Codigo', 'idEmpleado', 'Nombre', 'Paterno', 'Materno', 'CI', 'urlphoto', 'AreasAut', 'Cargo', 'CI', 'Vencimiento','Herramientas','NroRenovacion')->first();
        $fe = Carbon::parse($data['Vencimiento']);
        $mfecha = $fe->format('m');
        $afecha = $fe->format('Y');
        $meses = ['01' => 'Ene', '02' => 'Feb', '03' => 'Mar', '04' => 'Abr', '05' => 'May', '06' => 'Jun', '07' => 'Jul', '08' => 'Ago', '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dic'];
        // return view('credenciales.pdf_creden_emp_a');
        switch (session('aero')) {
            case 'LP':
                $pdf = pdf::loadView('credenciales.pdf_creden_emp_a', ['data' => $data, 'M' => $meses[$mfecha], 'Y' => $afecha = $fe->format('Y')]);

                break;
            case 'CB':
                $pdf = pdf::loadView('credenciales.pdf_creden_emp_b', ['data' => $data, 'M' => $meses[$mfecha], 'Y' => $afecha = $fe->format('Y')]);

                break;
            case 'SC':
                $pdf = pdf::loadView('credenciales.pdf_creden_emp_c', ['data' => $data, 'M' => $meses[$mfecha], 'Y' => $afecha = $fe->format('Y')]);

                break;

            default:
                # code...
                break;
        }
        // $pdf = pdf::loadView('credenciales.pdf_creden_emp_a', ['data' => $data]);
        $pdf->setpaper(array(0, 0, 341, 527), 'portrait');
        return $pdf->stream('invoice.pdf');
    }

    public function query_destroy_credencial(Request $request)
    {
        return Empleados::where('idEmpleado', $request->input('id'))->delete();
    }

    public function query_edit_emp(Request $request)
    {
        $emp = Empleados::where('idEmpleado', $request->input('id'))->first();
        // return Carbon::parse($emp['Vencimiento'])->format('Y-d-m');
        // array_push($emp,['ven'=>Carbon::parse($emp['Vencimiento'])->format('Y-d-m')]);
        return ['data' => $emp, 'ven' => Carbon::parse($emp['Vencimiento'])->format('Y-d-m'), 'nac' => Carbon::parse($emp['FechaNac'])->format('Y-d-m'), 'ing' => Carbon::parse($emp['Fecha'])->format('Y-d-m')];
    }
}
