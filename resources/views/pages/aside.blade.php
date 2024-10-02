  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item @if(request()->routeIs('quizz.index')) active @endif">
            <a class="nav-link collapsed "   href="{{ route("quizz.index" , auth()->user()->id) }}">
              <i class="bi bi-book"></i>
              <span >Quizz
              </span>
            </a>
          </li><!-- End Profile Page Nav -->
          <li class="nav-item @if(request()->routeIs('user.index')) active @endif">
            <a class="nav-link collapsed" href="{{ route("user.index" , auth()->user()->id) }}">
              <i class="bi bi-person"></i>
              <span>Users</span>
            </a>
          </li><!-- End Profile Page Nav -->
      <li class="nav-item @if(request()->routeIs('user.profile')) active @endif">
        <a class="nav-link collapsed" href="{{ route("user.profile" , auth()->user()->id) }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->






    </ul>

  </aside><!-- End Sidebar-->
