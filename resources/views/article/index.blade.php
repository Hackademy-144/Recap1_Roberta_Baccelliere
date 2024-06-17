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
            @foreach ($articles as $article)
                <div class="col-12 col-md-3 mt-2 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{($article->title)}}</h5>
                            <p class="card-text">{{($article->subtitle)}}</p>
                            <p class="card-text"> Articolo di: {{($article->user->name)}}</p>
                            <p class="card-text small">
                                @foreach ($article->tags as $tag)
                                <span>#{{$tag->name}}</span>
                                @endforeach
                            <a href="{{route('article.show', compact('article'))}}" class="btn btn-danger">Dettaglio</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
