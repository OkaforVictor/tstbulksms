<!DOCTYPE html>
<html lang="en">

  @include("includes.styles")
  <meta name="csrf-token" content="{{ csrf_token() }}">

<body class="hold-transition login-page dark-mode">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="javascript:void(0)" class="h1">TSTech Message</a>
    </div>
    <div class="card-body">
      
      <form>
        <div id="dashboardform">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" id="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" id="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block" id ="dashboardlog">Login</button>
            </div>       
          </div>
        </div>
       @csrf 
      </form>

      <p class="mb-1">
        {{-- <a href="forgot-password.html">I forgot my password</a> --}}
      </p>
      <p class="mb-0">
        {{-- <a href="register.html" class="text-center">Register a new membership</a> --}}
      </p>
    </div>
  </div>
</div>


@include("includes.scripts")

</body>
</html>
