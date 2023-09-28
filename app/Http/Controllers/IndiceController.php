<?php

namespace App\Http\Controllers;

use App\Models\IndiceModel;
use Illuminate\Http\Request;

class IndiceController extends Controller
{
    /**
     * Undocumented variable
     *
     * @var IndiceModel
     */
    private $model;

    public function __construct()
    {
        $this->model = new IndiceModel();
    }

    public function getIndiceMeses(Request $request)
    {
        $request->merge(
            [
                'indice' => $request->route('indice'),
                'meses'  => $request->get('meses')
            ]
        );

        $request->validate([
            'indice' => ['required'],
            'meses'  => ['required']
        ]);
        $data = $this->model->getIndiceMeses(
            $request->route('indice'),
            $request->get('meses')
        );
        return response()->json(['data' => $data]);
    }
    public function getIndicePeriodo(Request $request)
    {
        $request->merge(
            [
                'indice' => $request->route('indice'),
                'de'     => $request->get('de'),
                'ate'    => $request->get('ate')
            ]
        );

        $request->validate([
            'indice' => ['required'],
            'de'     => ['required'],
            'ate'    => ['required']
        ]);
        $data = $this->model->getIndicePeriodo(
            $request->route('indice'),
            $request->get('de'),
            $request->get('ate')
        );
        return response()->json(['data' => $data]);
    }
}
