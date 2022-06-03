<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function list(){

        $produto=Produto::all();
        return $produto;

    }
    public function show($id){

        $produto = Produto::find($id);
        return $produto;

    }

    
    
}
