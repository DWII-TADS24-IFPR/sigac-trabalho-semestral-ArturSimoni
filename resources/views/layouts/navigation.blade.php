<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-uppercase" href="{{ route('dashboard') }}">
            SIGAC
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if(Auth::check() && Auth::user()->role)
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if(Auth::user()->role->nome == 'aluno')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('aluno.dashboard*') ? 'active' : '' }}" href="{{ route('aluno.dashboard') }}">Painel Aluno</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('aluno.declaracao.pdf') }}">Gerar Declaração PDF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('aluno.documentos.create') }}">Submeter Documento</a>
                        </li>
                    @elseif(Auth::user()->role->nome == 'coordenador')
                        <li class="nav-item"><a class="nav-link" href="{{ route('coordenador.alunos.index') }}">Alunos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('coordenador.turmas.index') }}">Turmas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('coordenador.cursos.index') }}">Cursos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('coordenador.comprovantes.index') }}">Comprovantes</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('coordenador.declaracoes.index') }}">Declarações</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('coordenador.documentos.index') }}">Documentos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('coordenador.categorias.index') }}">Categorias</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('coordenador.eixos.index') }}">Eixos</a></li>
                    @endif
                </ul>
            @endif

            <!-- Usuário Dropdown -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">Sair</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
