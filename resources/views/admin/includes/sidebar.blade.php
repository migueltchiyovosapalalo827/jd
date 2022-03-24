
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('logo.png')}}" alt="jd Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">João Dono</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->

               @role('Admin')
               <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-list-ul " aria-hidden="true"></i>
                  <p>
                    Categoria
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('categoria.create') }}" class="nav-link">
                        <i class="fa fa-plus-circle nav-icon" aria-hidden="true"></i>
                        <p>Nova Categoria</p>
                      </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('categoria.index') }}" class="nav-link">
                          <i class="far fa-dot-circle nav-icon "></i>
                          <p>Listar Categoria</p>
                        </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                  <p>
                       Funcionarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href=" {{  route('users.create') }}" class="nav-link">
                     <i class="fas fa-user-plus  nav-icon"></i>
                      <p>Cadastar Funcionario</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{  route('users.index') }}" class="nav-link">
                      <i  class="fas fa-user  nav-icon"></i>
                      <p>Listar Funcionarios</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-podcast" aria-hidden="true"></i>
                  <p>
                  Artigos
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('artigos.create') }}" class="nav-link">
                        <i  class="fa fa-plus-circle nav-icon" aria-hidden="true"></i>
                        <p>Publicar novo artigo</p>
                      </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('artigos.index') }}" class="nav-link">
                            <i class="fa fa-archive nav-icon" aria-hidden="true"></i>
                            <p>Listar  artigos</p>
                        </a>
                      </li>
                    <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="fas fa-list-ol  nav-icon "></i>
                        <p> PUBLICADOS EM PLATAFORMAS
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('artigoscienticos.create') }}" class="nav-link">
                              <i  class="fa fa-plus-circle nav-icon" aria-hidden="true"></i>
                              <p>Publicar novo artigo</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('artigoscienticos.index') }}" class="nav-link">
                              <i class="fa fa-archive nav-icon" aria-hidden="true"></i>
                              <p>Listar  artigos</p>
                            </a>
                          </li>

                      </ul>
                    </li>

                  </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">

                  <i class="nav-icon fa fa-book-open" aria-hidden="true"></i>
                  <p>
                    Livros
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('livros.create') }}" class="nav-link">
                      <i  class="fa fa-plus-circle nav-icon" aria-hidden="true"></i>
                      <p>Publicar novo Livro</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('livros.index') }}" class="nav-link">
                      <i class="fa fa-archive nav-icon" aria-hidden="true"></i>
                      <p>Listar  Livros</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">

                  <i class="nav-icon fas fa-newspaper" aria-hidden="true"></i>
                  <p>
                    Jornais e revista
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('jornais.create') }}" class="nav-link">
                      <i  class="fa fa-plus-circle nav-icon" aria-hidden="true"></i>
                      <p>Publicar novo artigo</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('jornais.index') }}" class="nav-link">
                      <i class="fa fa-archive nav-icon" aria-hidden="true"></i>
                      <p>Listar  artigos</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-comment" aria-hidden="true"></i>
                  <p>
                    Blog
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('blogs.create')}} " class="nav-link">
                          <i  class="fa fa-plus-circle nav-icon" aria-hidden="true"></i>
                          <p>Postar</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('blogs.index')}}" class="nav-link">
                          <i class="fa fa-archive nav-icon" aria-hidden="true"></i>
                          <p>Listar Blog</p>
                        </a>
                      </li>

                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file-pdf  "></i>
                  <p>
                    Legal alert
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('newspapers.create')}}" class="nav-link">
                          <i  class="fa fa-plus-circle nav-icon" aria-hidden="true"></i>
                          <p>Postar Legal alert</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('newspapers.index')}}" class="nav-link">
                          <i class="fa fa-archive nav-icon" aria-hidden="true"></i>
                          <p>Listar  Legal alert</p>
                        </a>
                      </li>

                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user-friends  "></i>
                  <p>
                    Subscritor
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="" class="nav-link">
                          <i class="fa fa-archive nav-icon" aria-hidden="true"></i>
                          <p>Listar Subcritor</p>
                        </a>
                      </li>

                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-list-ul" aria-hidden="true"></i>
                  <p>
                    Formação
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="" class="nav-link">
                        <i class="fa fa-plus-circle nav-icon" aria-hidden="true"></i>
                        <p>Nova Formação</p>
                      </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('formacoes.index')}}" class="nav-link">
                          <i class="far fa-dot-circle nav-icon "></i>
                          <p>Listar Formação</p>
                        </a>
                      </li>
                    <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="fas fa-list-ol  nav-icon "></i>
                        <p>
                          Candidatos
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">

                        <li class="nav-item">
                          <a href="{{route('candidatos.index')}}" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Listar Candidatos</p>
                          </a>
                        </li>

                      </ul>
                    </li>

                  </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-toolbox " aria-hidden="true"></i>
                  <p>
                    Configuração
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="fa fa-user-times nav-icon " aria-hidden="true"></i>
                        <p>
                          Função
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('funcoes.create') }}" class="nav-link">
                              <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                              <p>Cadastrar Função</p>
                            </a>
                          </li>

                        <li class="nav-item">
                          <a href="{{ route('funcoes.index') }}" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Listar Função</p>
                          </a>
                        </li>

                      </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                          <i class="fas fa-lock-open nav-icon " aria-hidden="true"></i>
                          <p>
                            Permissão
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('permissoes.create') }}" class="nav-link">
                                <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                                <p>Cadastrar  Permissão</p>
                              </a>
                            </li>

                          <li class="nav-item">
                            <a href="{{route('permissoes.index')}}" class="nav-link">
                              <i class="far fa-dot-circle nav-icon"></i>
                              <p>Listar  Permissão</p>
                            </a>
                          </li>

                        </ul>
                      </li>

                  </ul>
              </li>
              @endrole
          @role('formando')
              <li class="nav-header">Area do formando </li>
              <li class="nav-item">
                <a href="{{route('candidatos.formacao')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Cursos Disponiveis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('candidatos.meuscursos')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Meus cursos</p>
                </a>
              </li>
              @endrole
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
