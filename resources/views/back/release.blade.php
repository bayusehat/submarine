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
                      <form class="row row-cols-lg-auto g-3 align-items-center" method="POST" onsubmit="return false;">
                        <div class="col-12">
                          <label class="visually-hidden" for="example-if-email">Genre</label>
                          <input type="text" class="form-control" id="genre" name="genre" placeholder="Genre">
                          <small class="text-danger" id="notif_genre"></small>
                        </div>
                        <div class="col-12">
                           <button class="btn btn-primary btn-block" id="btnCreate" onclick="create()">CREATE</button>
                           <button class="btn btn-success btn-block" id="btnRefresh" onclick="cancel()"><i class="fas fa-refresh"></i></button>
                           <button class="btn btn-warning btn-block" id="btnUpdate" onclick="update()">UPDATE</button>
                           <button class="btn btn-danger btn-block" id="btnCancel" onclick="cancel()">CANCEL</button>
                        </div>
                      </form>
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
                                <th>Genre</th>
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
                url: '{{ url("genre/load") }}'
            },
            columns: [
                { name: 'DT_RowIndex', data: 'DT_RowIndex', orderable: false, searchable: false },
                { name: 'genre', data: 'genre'},
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
