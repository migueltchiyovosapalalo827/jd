
        <nav class="navbar navbar-expand-lg navbar-dark cabecalho" aria-label="Eighth navbar example">
            <div class="container cabecalho">
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('frontend/img/logo.png')}}" width="50" height="36"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample07">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-bs-toggle="dropdown"
                                aria-expanded="false">Publicações</a>
                            <ul class="dropdown-menu submenu" aria-labelledby="dropdown07">
                                <li><a class="dropdown-item" href="{{route('artigo.todos')}}">Artigos</a></li>
                                <li><a class="dropdown-item" href="{{route('newspaper')}}">Newspaper</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('blog')}}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('formacao')}}">Formação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('sobre')}}">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('contacto')}}">Contactos</a>
                        </li>
                        
                 <!--- <div id="google_translate_element"> </div>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle textlang" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        português
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item lang" href="javascript:trocarIdioma('pt')">português</a>
                      <a class="dropdown-item lang" href="javascript:trocarIdioma('en')">inglês</a>
                    </div>
                  </li>-->

                    </ul>

                    <div class="search-box">

                        <button class="btn-search"><i class="bi bi-search"></i></button>
                        <input type="hidden" id="token" value="{{csrf_token()}}">
                        <input type="text" name="titulo" class="input-search" placeholder="pesquesar..." id="input-search">

                    </div>
                    
                 
                </div>
            </div>
        </nav>
