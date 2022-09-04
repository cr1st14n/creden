<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;


class credvisitaController extends Controller
{
    public function viewHome()
    {
        return view('credenciales.view_cv');
    }
    public function query_listCV(Request $request)
    {
        $aero = ['LP' => 'LPB', 'CB' => 'CBB', 'SC' => 'VVI'];
        // return $aero[ Auth::User()->aeropuerto];
        return Empleados::where('Tipo', "V")->where('aeropuerto', $aero[session('aero')])
            ->select(
                'Empleados.idEmpleado',
                'Empleados.Codigo',
                'Empleados.CodigoTarjeta',
                'Empleados.AreasAut',
                'Empleados.CodMYFARE',
            )
            ->orderBy('codigo', 'asc')
            ->get();
    }
    public function query_createCV(Request $request)
    {
        $aero = ['LP' => 'LPB', 'CB' => 'CBB', 'SC' => 'VVI'];
        $cod = Empleados::where('Tipo', "V")->where('aeropuerto', $aero[session('aero')])
            ->max('Codigo') + 1;
        $new = new Empleados();
        $new->Codigo = $cod;
        $new->CI = 0;
        $new->Tipo = 'V';
        $new->aeropuerto = $aero[session('aero')];
        $new->CodigoTarjeta = $request->input('ncv_codt');
        $new->CodMYFARE = $request->input('ncv_codMy');
        $new->AreasAut = $request->input('ncv_areas_acceso');
        $res = $new->save();
        return $res;
    }
    public function query_crevis_destroy(Request $request)
    {
        return Empleados::where('idEmpleado', $request->input('id'))->delete();
    }
    public function pdf_creden_v($id)
    {
        $data = Empleados::where('idEmpleado', $id)->select(
            'Codigo',
            'AreasAut',
            'aeropuerto',
        )->first();

        $rutaimgV = [
            'LPB' => 'resources/plantilla/CREDENCIALESFOTOS/V-LPB.jpg',
            'CBB' => 'resources/plantilla/CREDENCIALESFOTOS/V-CBB.jpg',
            'VVI' => 'resources/plantilla/CREDENCIALESFOTOS/V-VVI.jpg',
        ];
        $pdf = pdf::loadView(
            'credenciales.pdf_creden_v',
            [
                'data' => $data,
                'ruta' => $rutaimgV[$data['aeropuerto']],
                'aero' => $data['aeropuerto'],

            ]
        );


        $pdf->setpaper(array(0, 0, 341, 527), 'portrait');
        return $pdf->stream('invoice.pdf');
    }
}
