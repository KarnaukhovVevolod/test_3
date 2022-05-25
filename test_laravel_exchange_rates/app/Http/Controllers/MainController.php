<?php

namespace App\Http\Controllers;

use App\Service\GetGraphicService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * @var GetGraphicService
     */
    public $graphic;

    public function __construct()
    {
        $this->graphic = new GetGraphicService();
    }
    public function index()
    {
        $url = url("/graphic");
        $token = csrf_token();
        return view('home', compact('url','token'));
    }

    public function graphic(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data_post = $request->post();
            $responce = $this->graphic->getDataGraphic($data_post,'graphic_dollars');
        } else {
            $responce = [];
        }
        return response()->json($responce);
    }
}
