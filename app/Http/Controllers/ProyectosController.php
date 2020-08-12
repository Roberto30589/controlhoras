<?php

namespace App\Http\Controllers;

use App\Proyectos;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    public function page()
    {
        return view("proyectos.page");
    }
}
