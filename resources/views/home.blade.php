@extends('layouts.app')

@section('style')
    <style>
        .col-12{
            margin:10px 0;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        @auth
            <div class="col-12">
                <div class="card">                    
                    <form action="{{ route('post.store') }}" method="POST">
                        @csrf
                        <div class="card-header">Criar nova postagem</div>
                        <div class="card-body">
                            <label for="titulo">Titulo</label></br>
                            <textarea name="titulo" id="titulo" rows="1" cols="60" ></textarea></br>
                            <label for="conteudo">Postagem</label>
                            <textarea name="conteudo" id="conteudo" rows="10" cols="80" ></textarea>  
                                             
                        </div>
                        </br>                        
                        <div class="card-footer d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        @endauth
        @if($idfdb == 1)
            <div class="col-12">
                <div class="card">
                    <div class="card-body" align="center">                        
                            <font color="green"><b>Sua postagem foi enviada com sucesso!</b></font>                     
                    </div>
                </div>
            </div>
        @elseif($idfdb == 2)
            <div class="col-12">
                <div class="card">
                    <div class="card-body" align="center">                        
                        <font color="green"><b>Seu comentario foi enviado com sucesso!</b></font>                      
                    </div>
                </div>
            </div>    
        @elseif($idfdb == 3)
            <div class="col-12">
                <div class="card">
                    <div class="card-body" align="center">                        
                            <font color="red"><b>Você não inseriu o titulo da sua postagem!</b></font>                     
                    </div>
                </div>
            </div>
        @elseif($idfdb == 4)
            <div class="col-12">
                <div class="card">
                    <div class="card-body" align="center">                        
                        <font color="red"><b>Você não inseriu o corpo da sua postagem!</b></font>                      
                    </div>
                </div>
            </div>                         
        @elseif($idfdb == 5)
            <div class="col-12">
                <div class="card">
                    <div class="card-body" align="center">                        
                        <font color="red"><b>Você não inseriu o corpo do seu comentario!</b></font>                        
                    </div>
                </div>
            </div>
        @endif
        @guest
            <div class="col-12">
                <div class="card">
                    <div class="card-body" align="center">                        
                            <h5>Registre-se ou faça login para postar e comentar!</h5>                        
                    </div>
                </div>
            </div>
        @endguest
        @if(count($todosposts)==0)
            <div class="col-12">
                <div class="card">
                    <div class="card-body" align="center">                        
                            <h5>Não há nenhuma postagem ainda!</h5>                        
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-6 col-12">
            @if(count($todosposts)!=0)
                @foreach($todosposts->split(2)[0] as $c)
                    @component('components.post',['todosusuarios'=>$todosusuarios, 'post'=>$c, 'todoscomentarios'=>$todoscomentarios])                    
                    @endcomponent
                    </br>
                @endforeach
            @endif            
        </div>
        <div class="col-md-6 col-12">
            @if(count($todosposts) >= 2 )
                @foreach($todosposts->split(2)[1] as $c)
                    @component('components.post',['todosusuarios'=>$todosusuarios, 'post'=>$c, 'todoscomentarios'=>$todoscomentarios])                    
                    @endcomponent
                    </br>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        window.onload = function(){ 
            CKEDITOR.replace('conteudo')
            CKEDITOR.config.height = 100;
        }
    </script>
@endsection
