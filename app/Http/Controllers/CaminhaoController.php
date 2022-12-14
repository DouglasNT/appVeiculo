<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Caminhao;

class CaminhaoController extends Controller
{
    public function FormularioCadastro(){
        return view('cadastrarCaminhao');
    }

    public function MostrarEditarCaminhao(Request $request){

        //$dadosCaminhao = Caminhao::all();
        //dd($dadosCaminhao);

        $dadosCaminhao = Caminhao::query();
        $dadosCaminhao->when($request->marca, function($query, $vl){
            $query->where('marca', 'like','%'.$vl.'%');
        });

        $dadosCaminhao = $dadosCaminhao->get();

        return view('editarCaminhao', ['registrosCaminhao' => $dadosCaminhao]);
        
    }

    public function SalvarBanco(Request $request){
        $dadosCaminhao = $request->validate([
            'modelos' => 'string|required',
            'marca' => 'string|required',
            'ano' => 'string|required',
            'cor' => 'string|required',
            'valor' => 'string|required'
        ]);
        
        Caminhao::create($dadosCaminhao);

        return Redirect::route('home');
    }

    public function ApagarBancoCaminhao(Caminhao $registrosCaminhaos){
        
        $registrosCaminhaos -> delete();
        
        return Redirect::route('editar-caminhao');
    }

    public function MostrarAlterarCaminhao(Caminhao $registrosCaminhaos){
       // dd($registrosCaminhaos);
        return view('alterarCaminhao',['registrosCaminhaos' => $registrosCaminhaos]);

    }

    public function AlterarBancoCaminhao(Caminhao $registrosCaminhaos, Request $request){

        $banco = $request->validate([
            'modelos' => 'string|required',
            'marca' => 'string|required',
            'ano' => 'string|required',
            'cor' => 'string|required',
            'valor' => 'string|required'
        ]);

        $registrosCaminhaos->fill($banco);
        $registrosCaminhaos->save();

        return Redirect::route('editar-caminhao');

    }

}