<!DOCTYPE html>
<html>
    @include('admin.includes.head')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="{{asset('logo.png')}}"  alt="" >
    <a href="#"><b>João dono</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">

    <div class="card-body login-card-body">

      <p class="login-box-msg">Faça login para iniciar sua sessão</p>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
          <input  class="form-control" placeholder="Email" type="email" name="email"   value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password"  name="password"
          required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->

      <p class="mb-1">
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}"> Esqueceu sua senha?</a>
        @endif
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@include('admin.includes.foot')
</body>
</html>
