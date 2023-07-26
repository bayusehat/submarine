
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Submarine Records - Register</title>

    <meta name="description" content="Submarine Records">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/icon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icon.png') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets_back/css/codebase.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
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

                <!-- Sign Up Form -->
                <!-- jQuery Validation functionality is initialized with .js-validation-signup class in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-signup" action="{{ url('doreg') }}" method="POST">
                    @csrf
                  <div class="block block-themed block-rounded block-fx-shadow">
                    <div class="block-header bg-gd-emerald">
                      <h3 class="block-title">Please add your details</h3>
                    </div>
                    <div class="block-content">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ Session::get('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(session('failed'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Failed!</strong> {{ Session::get('failed')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                      <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name">
                        <label class="form-label" for="signup-username">Name</label>
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                      </div>
                      <div class="form-floating mb-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        <label class="form-label" for="signup-email">Email</label>
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                      </div>
                      <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        <label class="form-label" for="password">Password</label>
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                      </div>
                      <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm password">
                        <label class="form-label" for="password-confirm">Confirm Password</label>
                        @error('password_confirm') <small class="text-danger">{{ $message }}</small> @enderror
                      </div>
                      <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone">
                        <label class="form-label" for="Phone">Phone</label>
                        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                      </div>
                      <div class="row">
                        <div class="col-sm-6 d-sm-flex align-items-center push">
                          {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="signup-terms" name="signup-terms" value="1">
                            <label class="form-check-label" for="signup-terms">I agree to Terms</label>
                          </div> --}}
                        </div>
                        <div class="col-sm-6 text-sm-end push">
                          <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">
                            Register
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="block-content block-content-full bg-body-light d-flex justify-content-between">
                        {{-- href="#" data-bs-toggle="modal" data-bs-target="#modal-terms" --}}
                      <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block">
                        <i class="fa fa-book opacity-50 me-1"></i> Do you have account?
                      </a>
                      <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ url('/login') }}">
                        <i class="fa fa-arrow-left opacity-50 me-1"></i> Login
                      </a>
                    </div>
                  </div>
                </form>
                <!-- END Sign Up Form -->
              </div>
            </div>
          </div>

          <!-- Terms Modal -->
          <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
              <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                  <div class="block-header block-header-default">
                    <h3 class="block-title">Terms &amp; Conditions</h3>
                    <div class="block-options">
                      <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="block-content fs-sm">
                    <h5 class="mb-2">1. General</h5>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.
                    </p>
                    <h5 class="mb-2">2. Account</h5>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.
                    </p>
                    <h5 class="mb-2">3. Service</h5>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.
                    </p>
                    <h5 class="mb-2">4. Payments</h5>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.
                    </p>
                  </div>
                  <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                      Close
                    </button>
                    <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal">
                      Done
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END Terms Modal -->
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!--
        Codebase JS

        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="{{ asset('assets_back/js/codebase.app.min.js') }}"></script>

    <!-- jQuery (required for Select2 + jQuery Validation plugins) -->
    <script src="{{ asset('assets_back/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets_back/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets_back/js/pages/op_auth_signin.min.js') }}"></script>
  </body>
</html>
