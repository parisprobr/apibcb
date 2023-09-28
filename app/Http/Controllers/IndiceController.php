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
    
    public function getIndice(Request $request)
    {
        $request->merge(['indice' => $request->route('indice')]);
        $request->validate([
            'indice' => ['required']
        ]);
        return response()->json(['data' => $this->model->getIndice($request->route('indice'))]);
    }

}
