 <!-- Main Container -->
 <main id="main-container">
    <!-- Page Content -->
    <div class="content">
      {{-- <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Roster Management</h3>
                </div>
                <div class="block-content block-content-full">
                  <div class="row">
                    <div class="col-lg-8 space-y-2">
                      <!-- Form Inline - Default Style -->
                      <a href="{{ url('roster/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Create</a>
                      <!-- END Form Inline - Default Style -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xl-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                      <h3 class="block-title">Fill data Release</h3>
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
                            <form method="post" action="{{ url('release/insert') }}" id="formCreate" enctype="multipart/form-data"
                            >
                            @csrf
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Release Title">
                                    <label class="form-label" for="roster_name"> Release Title</label>
                                    @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-4">
                                    <select name="release_type" id="roster" class="form-control">
                                        <option value="">Choose Type</option>
                                        <option value="1">Single</option>
                                        <option value="2">EP</option>
                                        <option value="3">LP</option>
                                    </select>
                                    <label class="form-label" for="roster_name">Release Type</label>
                                    @error('release_type') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="file" name="release_image[]" id="release_image" class="form-control" placeholder="Release Photo" multiple>
                                    <label class="form-label" for="roster_photo">Photo</label>
                                    @error('release_image') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-4">
                                    <textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
                                    <label class="form-label" for="description">Description</label>
                                    @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-4">
                                    <select name="roster" id="roster" class="form-control">
                                        <option value="">Choose Artist</option>
                                        @foreach ($roster as $r)
                                            <option value="{{ $r->id_roster }}">{{ $r->name }}</option>
                                        @endforeach
                                    </select>
                                    <label class="form-label" for="roster_name"> Artist</label>
                                    @error('roster') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Enter price">
                                    <label class="form-label" for="roster_name">Price</label>
                                    @error('price') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="date" class="form-control" name="release_date" id="release_date" placeholder="Enter Release Date">
                                    <label class="form-label" for="roster_name">Release Date</label>
                                    @error('release_date') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mt-4">
                                   <input type="submit" name="submit" id="submit" class="btn btn-success" value="Create new Roster">
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
