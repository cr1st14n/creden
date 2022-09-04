<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Empresas;
use App\Models\Marca;
use App\Models\Tipo;
use Illuminate\Http\Request;

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
    public function create_1()
    {
        $emp= Empresas::select('Empresa','NombEmpresa')->get();
        $color= Color::get();
        $tipo= Tipo::get();
        $marca= Marca::get();

        return ['emp'=>$emp,'color'=>$color,'tipo'=>$tipo,'marca'=>$marca,];
    }
}
