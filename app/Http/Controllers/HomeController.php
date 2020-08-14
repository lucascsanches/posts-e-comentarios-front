<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Comentario;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
            ->with('todosposts',Post::All())
            ->with('todoscomentarios',Comentario::All())
            ->with('todosusuarios',User::All())
            ->with('idfdb',0);
       
    }

    public function feedback($idfdb)
    {
        return view('home')
            ->with('todosposts',Post::All())
            ->with('todoscomentarios',Comentario::All())
            ->with('todosusuarios',User::All())
            ->with('idfdb',$idfdb);      
    } 

}
