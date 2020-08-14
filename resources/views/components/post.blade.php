<div class="card">
    <div class="card-header">{{$post->titulo}}</div>
    <div class="card-body">
        <h6><b>Autor:</b> {{$todosusuarios->find($post->user_id)->name}}</h6>
        <p>
            <?php echo $post->conteudo; ?>
        </p>
        <hr>
        <small>{{$post->created_at}}</small></br>
        <a href="#comentarios-{{$post->id}}" data-toggle="collapse" aria-expanded="false" aria-controls="comentarios-{{$post->id}}">
                comentários ({{count($todoscomentarios->where('post_id',$post->id))}})
        </a>
        <div class="my-2 comentarios collapse" id="comentarios-{{$post->id}}">
            @if(count($todoscomentarios->where('post_id',$post->id))!=0)            
                @foreach($todoscomentarios->where('post_id',$post->id) as $c)    
                        @component('components.comentario',['autor'=>$todosusuarios->find($c->user_id)->name, 'conteudo'=>$c->conteudo, 'data'=>$c->created_at])
                        @endcomponent       
                @endforeach
            @else 
                <div class="card my-1">
                    <div class="card-body">
                        Não há nenhum comentário!
                    </div>
                </div>
            @endif 
        </div>
        @auth
            <hr>
            <div>
                <form action="{{ route('comentario.store',$post->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="postagem" value="1">
                    <div class="form-group">
                        <label for="comentario">Comentar:</label>
                        <textarea name="comentario" id="comentario" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Salvar comentário</button>
                </form>
            </div>    
        @endauth
    </div>
</div>