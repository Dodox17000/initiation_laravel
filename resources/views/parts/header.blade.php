@php 
$menu =[
  // 'Accueil','', 'A propos', 'Contact','Connexion'
  "Accueil"=>"home",
  "A propos"=>"aboutUs",
  "Liste des articles"=>"article_list"
  ];
  if(Auth::check()){
    $menu['Ajouter un article']="article_add";
  }
  @endphp
<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- @foreach ($menu as $element) --}}
                @foreach($menu as $key  => $nameRoute)
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route($nameRoute)}}">
                  {{$key}}
              </a>
                {{-- @if($loop->iteration == 1)
                <a class="nav-link active" aria-current="page" href="/">
                    {{$element}}
                </a>
                @else
                <a class="nav-link active" aria-current="page" href="/{{ str_replace(" ", "-",strtolower($element))}}">
                    {{$element}}
                </a>
                @endif --}}
              </li>
              @endforeach
            </ul>
            <form class="d-flex" action='{{route('article_recherche')}}' role="search">
              <input class="form-control me-2" type="search" name='recherche' placeholder="Recherche" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Recherche</button>
            </form>
          </div>
        </div>
      </nav>
    </header>