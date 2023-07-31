
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Submarine Records - Login</title>

    <meta name="description" content="Submarine Records">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/icon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icon.png') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets_back/css/codebase.min.css') }}">
  </head>

  <body>
    <div id="page-container" class="main-content-boxed">

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="bg-body-dark">
          <div class="row mx-0 justify-content-center">
            <div class="hero-static col-lg-6 col-xl-4">
              <div class="content content-full overflow-hidden">
                <!-- Header -->
                <div class="py-4 text-center">
                    <img src="{{ asset('assets\img\logo-submarine.png') }}" alt="Logo Submarine" class="img-fluid img-responsive" width="200">
                </div>
                <!-- END Header -->
                <form class="js-validation-signin" action="{{ url('/dologin') }}" method="POST">
                    @csrf
                  <div class="block block-themed block-rounded block-fx-shadow">
                    <div class="block-header bg-gd-dusk">
                      <h3 class="block-title">Please Login</h3>
                    </div>
                    <div class="block-content">
                        @if(session('failed'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Failed!</strong> {{ Session::get('failed')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                      <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                        <label class="form-label" for="login-email">E-mail</label>
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                      </div>
                      <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        <label class="form-label" for="login-password">Password</label>
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                      </div>
                      <div class="row">
                        <div class="col-sm-6 d-sm-flex align-items-center push">
                          {{-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="login-remember-me" name="login-remember-me">
                            <label class="form-check-label" for="login-remember-me">Remember Me</label>
                          </div> --}}
                        </div>
                        <div class="col-sm-6 text-sm-end push">
                          <button type="submit" class="btn btn-lg btn-alt-primary fw-medium">
                            Login
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="block-content block-content-full bg-body-light text-center d-flex justify-content-between">
                      {{-- <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ url('/register') }}">
                        <i class="fa fa-plus opacity-50 me-1"></i> Create Account
                      </a> --}}
                      <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="#">
                        Forgot Password
                      </a>
                      <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ url('/register') }}">
                        <i class="fa fa-plus opacity-50 me-1"></i> Create Account
                      </a>
                    </div>
                  </div>
                </form>
                <!-- END Sign In Form -->
              </div>
            </div>
          </div>
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
    <script src="{{ asset('assets_back/js/codebase.app.min.js') }}"></script>
    <script src="{{ asset('assets_back/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('assets_back/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets_back/js/pages/op_auth_signin.min.js') }}"></script>
  </body>
</html>
