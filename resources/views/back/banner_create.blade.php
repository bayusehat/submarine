 <!-- Main Container -->
 <main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xl-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                      <h3 class="block-title">Fill data Banner</h3>
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
                        <div class="col-lg-6 col-md-6 col-sm-12 space-y-2">
                            <form method="post" action="{{ url('banner/insert') }}" id="formCreate" enctype="multipart/form-data"
                            >
                            @csrf
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" name="tagline" id="tagline" placeholder="Enter Banner Name">
                                    <label class="form-label" for="Tagline">Tagline</label>
                                    @error('tagline') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" name="sub_tagline" id="sub_tagline" placeholder="Enter Subtagline">
                                    <label class="form-label" for="Tagline">Sub tagline</label>
                                    @error('sub_tagline') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="file" name="img_banner" id="img_banner" class="form-control" placeholder="Banner Photo">
                                    <label class="form-label" for="img_banner">Image Banner</label>
                                    @error('img_banner') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-4p">
                                    <input type="text" class="form-control" name="link" id="link" placeholder="Stream link">
                                    <label class="form-label" for="description">Link</label>
                                    @error('link') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mt-4">
                                   <input type="submit" name="submit" id="submit" class="btn btn-success" value="Create new Banner">
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 space-y-2">

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
