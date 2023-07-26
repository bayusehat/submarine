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
                      <h3 class="block-title">Fill data Roster</h3>
                    </div>
                    <div class="block-content block-content-full">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 space-y-2">
                            <form method="post" action="{{ url('roster/insert') }}" id="formCreate" enctype="multipart/form-data"
                            >
                            @csrf
                                <div class="form-group">
                                    <label for="">Roster Name</label>
                                    <input type="text" class="form-control" name="roster_name" id="roster_name" placeholder="Hi-Standard">
                                    @error('roster_name') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Photo</label>
                                    <input type="file" name="roster_photo" id="roster_photo" class="form-control">
                                    @error('roster_photo') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group mt-3">
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
