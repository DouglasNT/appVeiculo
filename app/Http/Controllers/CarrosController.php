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

    public function EditarCarro(Request $request){
        
        //$dadosCarros = Carros::all();
        //dd($dadosCaminhao);

        $dadosCarros = Carros::query();
        $dadosCarros->when($request->marca, function($query, $vl){
            $query->where('marca', 'like','%'.$vl.'%');
        });

        $dadosCarros = $dadosCarros->get();

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

    public function ApagarBancoCarro(Carros $registrosCarros){
        
        $registrosCarros -> delete();
        
        return Redirect::route('editar-carro');
    }

    public function MostrarAlterarCarro(Carros $registrosCarros){
        
         return view('alterarCarro',['registrosCarros' => $registrosCarros]);
 
     }
 
     public function AlterarBancoCarro(Carros $registrosCarros, Request $request){
 
         $banco = $request->validate([
             'modelo' => 'string|required',
             'marca' => 'string|required',
             'ano' => 'string|required',
             'cor' => 'string|required',
             'valor' => 'string|required'
         ]);
 
         $registrosCarros->fill($banco);
         $registrosCarros->save();
 
         return Redirect::route('editar-carro');
 
     }

}