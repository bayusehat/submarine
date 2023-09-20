 <!-- Main Container -->
 <main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xl-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                      <h3 class="block-title">Fill data Invoice</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="row">
                            <div class="col-md-12 col-xl-12 col-sm-12">
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
                            </div>
                        </div>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 space-y-2">
                            <form method="post" action="{{ url('invoice/insert') }}" id="formCreate" enctype="multipart/form-data"
                            class="row gx-3 gy-2 align-items-center">
                            @csrf
                            <div class="col-sm-3">
                                    <label class="visually-hidden" for="specificSizeInputName">Name</label>
                                    <input type="text" class="form-control" id="specificSizeInputName" placeholder="Jane Doe">
                                </div>
                                <div class="col-sm-3">
                                    <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
                                    <div class="input-group">
                                    <div class="input-group-text">@</div>
                                    <input type="text" class="form-control" id="specificSizeInputGroupUsername" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="visually-hidden" for="specificSizeSelect">Preference</label>
                                    <select class="form-select" id="specificSizeSelect">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
                                        <label class="form-check-label" for="autoSizingCheck2">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
  <!-- END Main Container -->
  <script>

  </script>
