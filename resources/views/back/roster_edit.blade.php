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
                            <form method="post" action="{{ url('roster/update/'.$roster->id_roster) }}" id="formCreate" enctype="multipart/form-data"
                            >
                            @csrf
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" name="roster_name" id="roster_name" placeholder="Enter Roster Name" value="{{ $roster->name }}">
                                    <label class="form-label" for="roster_name">Roster Name</label>
                                    @error('roster_name') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="file" name="roster_photo" id="roster_photo" class="form-control" placeholder="Roster Photo">
                                    <label class="form-label" for="roster_photo">Photo</label>
                                    @error('roster_photo') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-4p">
                                    <textarea name="description" id="description" class="form-control" placeholder="Description">{{ $roster->description }}</textarea>
                                    <label class="form-label" for="description">Description</label>
                                    @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mt-4">
                                   <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update Roster">
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 space-y-2">
                            <img src="{{ asset('assets/img/roster/'.$roster->roster_photo) }}" id="roster_photo_view" alt="{{ $roster->roster_photo}}" class="img-fluid img-responsive">
                            @if ($roster->roster_photo != 'dummy.jpg')
                                <a href="javascript:void(0)" class="btn btn-danger btn-sm text-center" onclick="removePhoto({{ $roster->id_roster }})"><i class="fas fa-times"></i> Hapus Foto</a>
                            @else
                                {{-- <a href="javascript:void(0)" class="btn btn-primary btn-sm text-center" onclick="updatePhoto({{ $roster->id_roster }})"><i class="fas fa-upload"></i> Upload Foto</a> --}}
                            @endif
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

    function removePhoto(id){
        var dummy_photo = '{{ asset("assets/img/roster/dummy.jpg") }}';
        $.ajax({
            url : '{{ url("roster/remove/image") }}/'+id,
            method : 'GET',
            dataType : 'JSON',
            success:function(res){
                if(res.status == 'success'){
                    $("#roster_photo_view").attr('src',dummy_photo);
                }else{
                    alert(res.message);
                }
            }
        })
    }

  </script>
