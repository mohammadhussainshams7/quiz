@if (Session::has('nameUser'))
<nav class="navbar navbar-expand-lg " style="background-color: rgba(255,228,196,0.0);">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Contests</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{ Session::get('nameUser') }} </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route("logoutQuizz",Session::get('idUser')) }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


</div>
@endif
