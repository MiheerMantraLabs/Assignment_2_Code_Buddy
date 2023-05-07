<nav class="navbar bg-body-tertiary bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand">
        <h1 style="font-family: 'Raleway', sans-serif;"><b>Code<strong
        style="background-color: #fedc3b; padding: 0 20px;">Buddy</strong></b></h1>
    </a>
      <div class="d-flex" role="search">
        <a class="btn btn-light" href="{{route('logout')}}" title="logout" type="button"><i class="bi bi-box-arrow-right"></i></a>
      </div>
    </div>
  </nav>

  <div class="container card mt-3 alert alert-warning" style="white-space: wrap" role="alert">
    <p class="p-0 m-0">Hello <b>{{Auth::user()->name}}</b>, welcome to <b><u>Assignement 2 • Code Buddy</u></b>.</p>
  </div>