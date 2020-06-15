<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function page()
    {
        return view("clientes.page");
    }

    public function list(){
        return Clientes::all();
    }

    public function insert(Request $request)
    {
        $input = $request->all();
        $cliente = new Clientes();
        $cliente->fill($input);
        if($cliente->save()){
            return $cliente;
        }else{
            return "Error al Guardar cliente";
        }
    }

    public function select(Request $request)
    {
        //
    }

    public function update(Request $request)
    {
        $cliente = Clientes::findOrFail($request->id);
        $input = $request->all();
        $cliente->fill($input);
        if($cliente->save()){
            return $cliente;
        }else{
            return "Error al Guardar cliente";
        }
    }

    public function delete(Request $request)
    {
        //
    }
}
