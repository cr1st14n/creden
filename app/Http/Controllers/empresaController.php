<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class empresaController extends Controller
{
    public function view_2_empr()
    {
        $empr=Empresas::get();
        return view('empresa.view_1')->with('Emps'.$empr);
    }
    public function query_list()
    {
      return  Empresas::get();
    }
    public function query_buscar_A(Request $request)
    {
        return Empresas::where('Empresa','like', '%'.$request->input('data').'%')
        ->orWhere('NombEmpresa','like', '%'.$request->input('data').'%')
        ->orWhere('Email','like', '%'.$request->input('data').'%')
        ->orWhere('RepLegal','like', '%'.$request->input('data').'%')
        ->get();
    }
    public function query_create(Request $request)
    {
        return ' ;alskdfj';
        $n=new Empresas();
        $n->Empresa=$request->input('Emp_abreviacion');
        $n->NombEmpresa=$request->input('Emp_nombre');
        $n->Direccion=$request->input('Emp_dir');
        $n->Telefono=$request->input('Emp_telf');
        $n->Casilla=$request->input('Emp_casi');
        $n->Fax=$request->input('Emp_fax');
        $n->Email=$request->input('Emp_email');
        $n->RepLegal=$request->input('Emp_repLeg');
        $n->Ruc=$request->input('Emp_ruc');
       return $res=$n->save();   
    }
}
