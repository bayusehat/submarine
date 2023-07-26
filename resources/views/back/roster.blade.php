 <!-- Main Container -->
 <main id="main-container">
    <!-- Page Content -->
    <div class="content">
      <div class="row">
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
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xl-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                      <h3 class="block-title">Roster List</h3>
                    </div>
                    <div class="block-content block-content-full">
                      <div class="row">
                        <div class="col-lg-12 space-y-2">
                          <table class="table table-striped" id="tableGenre">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Roster</th>
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
                url: '{{ url("roster/load") }}'
            },
            columns: [
                { name: 'DT_RowIndex', data: 'DT_RowIndex', orderable: false, searchable: false },
                { name: 'roster', data: 'roster'},
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

    function deleteRoster(id){
        $.ajax({
            url : "{{ url('roster/delete') }}/"+id,
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
