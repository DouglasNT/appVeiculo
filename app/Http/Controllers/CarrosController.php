<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Carros;

class CarrosController extends Controller
{
    public function FormularioCadastroCarro(){
        return view('cadastrarCarro');
    }

    public function EditarCarro(){
        
        $dadosCarros = Carros::all();
        //dd($dadosCaminhao);
        return view('editarCarro', ['registrosCarro' => $dadosCarros]);

    }

    public function SalvarBancoCarro(Request $request){
        $dadosCarros = $request->validate([
            'modelo' => 'string|required',
            'marca' => 'string|required',
            'ano' => 'string|required',
            'cor' => 'string|required',
            'valor' => 'string|required'
        ]);
        
        Carros::create($dadosCarros);

        return Redirect::route('home');
    }
}
