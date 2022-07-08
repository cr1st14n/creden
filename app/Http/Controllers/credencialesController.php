<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// use Barryvdh\DomPDF\Facade\Pdf as PDF;
use PDF;
use Illuminate\Support\Facades\App;

class credencialesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view_1()
    {
        $em = Empleados::orderBy('idEmpleado', 'desc')->select('idEmpleado', 'Codigo', 'Nombre', 'Paterno', 'Materno', 'CI', 'urlphoto')->get();
        $empresas = Empresas::get();
        return view('credenciales.view_1')->with('Empr', $empresas)->with('e', $em);
    }
    public function queryCreate_1(Request $request)
    {
        // return $request;
        $new = new Empleados();
        // codigo
        $new->Codigo = $request->input('nc_cod');
        $new->tipo = $request->input('nc_tipo');
        $new->CI = $request->input('nc_ci');
        $new->Nombre = $request->input('nc_nom');
        $new->Paterno = $request->input('nc_pa');
        $new->Materno = $request->input('nc_ma');
        $new->Empresa = $request->input('nc_em');
        $new->Cargo = $request->input('nc_car');
        $new->CodigoTarjeta = $request->input('nc_codt');
        $new->CodMYFARE = $request->input('nc_codMy');
        $new->NroRenovacion = $request->input('nc_nren');
        $new->Herramientas = $request->input('nc_he');
        $new->AreasAut = $request->input('nc_areas_acceso');
        $new->GSangre = $request->input('nc_gs');
        $new->Vencimiento = $request->input('nc_fv');
        $new->aeropuerto = '';
        $new->estado = $request->input('nc_acci');
        $new->Fecha = $request->input('nc_f_in');
        $new->FechaNac = $request->input('nc_FNac');
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
        return Empleados::orderBy('idEmpleado', 'desc')->select('idEmpleado', 'Codigo', 'Nombre', 'Paterno', 'Materno', 'CI', 'urlphoto')->get();
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
        $data = Empleados::where('idEmpleado', $e)->select('idEmpleado', 'Nombre', 'Paterno', 'Materno', 'CI', 'urlphoto')->first();
        // return view('credenciales.pdf_creden_emp_a');
        switch (session('aero')) {
            case 'LP':
                $pdf = pdf::loadView('credenciales.pdf_creden_emp_a', ['data' => $data]);

                break;
            case 'CB':
                $pdf = pdf::loadView('credenciales.pdf_creden_emp_b', ['data' => $data]);

                break;
            case 'SC':
                $pdf = pdf::loadView('credenciales.pdf_creden_emp_c', ['data' => $data]);

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
        return Empleados::where('idEmpleado',$request->input('id'))->delete();
    }
}
