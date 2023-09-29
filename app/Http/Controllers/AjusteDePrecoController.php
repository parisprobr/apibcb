<?php

namespace App\Http\Controllers;

use App\Models\AjusteDePrecoModel;
use App\Models\IndiceModel;
use Carbon\Carbon;
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
            'indice' => ['required'],
            'preco'  => ['required'],
            'de'     => ['required'],
            'ate'    => ['required'],
        ]);

        $dataDeCarbon = Carbon::createFromFormat('d/m/Y', $request->get('de'));
        $dataAteCarbon = Carbon::createFromFormat('d/m/Y', $request->get('ate'));

        if ($dataDeCarbon->greaterThan($dataAteCarbon)) {
            throw new \Exception('A data "de" não pode ser maior do que a data "ate".');
        }

        $indiceHistorico = $this->indiceModel->getIndicePeriodo(
            $request->route('indice'),
            $request->get('de'),
            $request->get('ate')
        );
        return response()->json(
            ['data' => $this->model->ajusteDePrecoPeriodo($indiceHistorico, $request->get('preco'))]
        );
    }
}
