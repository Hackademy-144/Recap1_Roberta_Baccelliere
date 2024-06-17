<x-layout>
    <div class="container-fluid bg-success">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-1 mt-5 mb-5">Articoli</h1>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <img src="{{ Storage::url($article->img) }}" class="img-fluid" alt="...">
            </div>
            <div class="col-5 text-centerS">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ $article->subtitle }}</p>
                <p class="card-text"> Articolo di: {{ $article->user->name }}</p>
                <p>{{ $article->body }}</p>
                <p class="card-text small">
                    @foreach ($article->tags as $tag)
                        <span>#{{ $tag->name }}</span>
                    @endforeach
                <div class="d-flex">
                    <a href="{{ route('article.index') }}" class="btn btn-primary">Torna pagina iniziale</a>
                    <a href="{{route('article.edit', compact('article'))}}" class="btn btn-warning">Modifica</a>
                    <form action="{{route('article.destroy', compact('article'))}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
