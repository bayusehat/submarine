 <!-- Main Container -->
 <main id="main-container">
    <!-- Page Content -->
    <div class="content">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Releases Master</h3>
                </div>
                <div class="block-content block-content-full">
                  <div class="row">
                    <div class="col-lg-8 space-y-2">
                      <!-- Form Inline - Default Style -->
                      <a href="{{ url('release/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Create</a>
                      <!-- END Form Inline - Default Style -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xl-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                      <h3 class="block-title">Release list</h3>
                    </div>
                    <div class="block-content block-content-full">
                      <div class="row">
                        <div class="col-lg-12 space-y-2">
                          <table class="table table-striped" id="tableGenre">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Release Name</th>
                                <th>Type</th>
                                <th>Release Date</th>
                                <th>Artist</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
  <!-- END Main Container -->
  <style>
    #btnUpdate, #btnCancel {
        display: none;
    }
  </style>
  <script>
    $(document).ready(function(){
        $("#btnRefresh").hide();
    });
   var table = new DataTable('#tableGenre',{
            processing: true,
            serverSide: true,
            destroy: true,
            paging: true,
            ajax: {
                url: '{{ url("release/load") }}'
            },
            columns: [
                { name: 'DT_RowIndex', data: 'DT_RowIndex', orderable: false, searchable: false },
                { name: 'title', data: 'title'},
                { name: 'release_type', data: 'release_type'},
                { name: 'release_date', data: 'release_date'},
                { name: 'artist', data: 'artist'},
                { name: 'action' , data: 'action'}
            ],
            lengthMenu: [10,50,-1],
            order: [[0, 'desc']],
        });

    function cancel(){
        $("#btnCreate").show();
        $("#btnUpdate").hide();
        $("#btnCancel").hide();
        $("#btnRefresh").hide();
        $("#notif_genre").text('');
        $("#genre").val('');
        $("#btnUpdate").attr('onclick',"");
    }

    function create(){
        $.ajax({
            url : "{{ url('genre/create') }}",
            method : 'POST',
            data :{
                'genre' : $("#genre").val(),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(e){
                if(e.status == 'success'){
                    $("#genre").val('').focus();
                    table.ajax.reload(null,false);
                }else if(e.status == 'errors'){
                    $.each(e.errors,function(i,a){
                        $("#notif_"+i).text(a)
                    })
                    $("#btnRefresh").show();
                }else{
                    alert(e.message);
                }
            }
        })
    }

    function edit(id){
        $("#btnCreate").hide();
        $("#btnUpdate").show();
        $("#btnCancel").show();
        $.ajax({
            url : "{{ url('genre') }}/"+id,
            method : 'GET',
            dataType : 'JSON',
            success:function(e){
                $("#genre").val(e.data.genre)
                $("#btnUpdate").attr('onclick','update('+e.data.id_genre+')')
            }
        })
    }

    function update(id){
        $.ajax({
            url : "{{ url('genre/update') }}/"+id,
            method : 'POST',
            data :{
                'genre' : $("#genre").val(),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(e){
                if(e.status == 'success'){
                    table.ajax.reload(null,false);
                }else{
                    alert(e.message);
                }
            }
        })
    }

    function deleteGenre(id){
        $.ajax({
            url : "{{ url('genre/delete') }}/"+id,
            method : 'GET',
            dataType : 'JSON',
            success:function(e){
                if(e.status == 'success'){
                    table.ajax.reload(null,false);
                }else{
                    alert(e.message);
                }
            }
        })
    }
  </script>
