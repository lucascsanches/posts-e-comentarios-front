<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comentario;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!isset($request->titulo)){
            return redirect()->route('home.feedback',3);
        }elseif(!isset($request->conteudo)){
            return redirect()->route('home.feedback',4);
        }else{
            $id = Auth::user()->id;
            $Post = new Post;
            $Post->conteudo = $request->conteudo;
            $Post->user_id = $id;
            $Post->titulo = $request->titulo;
            $Post->save();
            return redirect()->route('home.feedback',1);
        }        
    }

    public function novoComentario(Request $request, $id)
    {
        if(isset($request->comentario))
        {
            $idUsuario = Auth::user()->id;
            $Comentario = new Comentario;
            $Comentario->conteudo = $request->comentario;
            $Comentario->user_id = $idUsuario;
            $Comentario->post_id = $id;
            $Comentario->save();
            return redirect()->route('home.feedback',2);
        }
        return redirect()->route('home.feedback',5);        
    }
   
}
