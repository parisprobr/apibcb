<?php

namespace App\Http\Controllers;

use App\Models\AjusteDePrecoModel;
use App\Models\IndiceModel;
use Illuminate\Http\Request;

class AjusteDePrecoController extends Controller
{
    
    private $model;
    private $indiceModel;

    public function __construct()
    {
        $this->model = new AjusteDePrecoModel();
        $this->indiceModel = new IndiceModel();
    }
    
    public function ajusteDePrecoPeriodo(Request $request)
    {
        $request->merge(
            [
                'indice' => $request->route('indice'),
                'preco'  => $request->route('preco'),
                'de'     => $request->get('de'),
                'ate'    => $request->get('ate')
            ]
        );
        $request->validate([
            'indice' => ['required']
            'preco'  => ['required']
            'de'     => ['required']
            'ate'    => ['required']
        ]);
        dd($request->all());
        die('aqui');
        return response()->json(
            ['data' => $this->model->ajusteDePrecoPeriodo($request->route('indice'))]
        );
    }

}
