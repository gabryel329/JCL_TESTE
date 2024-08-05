<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div style="text-align: center;">
          <p class="app-sidebar__user-name" style="color: white;">{{ Auth::user()->name }}</p>
        </div>
        <hr>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{ route('curso.index') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Cursos</span></a></li>
        <li><a class="app-menu__item" href="{{ route('aluno.index') }}"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Alunos</span></a></li>
      </ul>
    </aside>