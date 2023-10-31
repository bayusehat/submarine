 <!-- Main Container -->
 <main id="main-container">
    <!-- Page Content -->
    <div class="content">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Ticket adds</h3>
                </div>
                <div class="block-content block-content-full">
                  <div class="row">
                    <div class="col-lg-12 space-y-2">
                      <!-- Form Inline - Default Style -->
                      <form class="row row-cols-lg-auto g-3 align-items-center" method="POST" onsubmit="return false;">
                        <div class="col-md-3 col-sm-6 col-xl-3">
                          <label class="visually-hidden" for="example-if-email">Event Name</label>
                          <input type="text" class="form-control" id="event_name" name="event_name" placeholder="Name of Event">
                          <small class="text-danger" id="notif_event_name"></small>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xl-3">
                            <label class="visually-hidden" for="example-if-email">Event Date</label>
                            <input type="datetime-local" class="form-control" id="event_date" name="event_date" placeholder="Date of Event">
                            <small class="text-danger" id="notif_event_date"></small>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xl-3">
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
                      <h3 class="block-title">Event list</h3>
                    </div>
                    <div class="block-content block-content-full">
                        {{-- <div class="row">
                            <div class="col-12 mb-3 align-right">
                                <a href="{{ url('scan') }}" class="btn btn-success"><i class="fas fa-search"></i> Scanner</a>
                            </div>
                        </div> --}}
                      <div class="row">
                        <div class="col-lg-12 space-y-2">
                          <table class="table table-striped table-responsive display compact" id="tableTicket" width="100%">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Event Name</th>
                                <th>Date</th>
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
   var table = new DataTable('#tableTicket',{
            processing: true,
            serverSide: true,
            destroy: true,
            paging: true,
            responsive: true,
            ajax: {
                url: '{{ url("event/load") }}'
            },
            columns: [
                { name: 'DT_RowIndex', data: 'DT_RowIndex', searchable: false },
                { name: 'event_name', data: 'event_name'},
                { name: 'event_date', data: 'event_date'},
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
            url : "{{ url('event/create') }}",
            method : 'POST',
            data :{
                'event_name' : $("#event_name").val(),
                'event_date' : $("#event_date").val(),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(e){
                if(e.status == 'success'){
                    $("#event_name").val('').focus();
                    $("#event_date").val('');
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
            url : "{{ url('event/edit') }}/"+id,
            method : 'GET',
            dataType : 'JSON',
            success:function(e){
                console.log(e)
                $("#event_date").val(e.data.event_date).focus();
                $("#event_name").val(e.data.event_date);
                $("#btnUpdate").attr('onclick','update('+e.data.id_event+')')
            }
        })
    }

    function update(id){
        $.ajax({
            url : "{{ url('event/update') }}/"+id,
            method : 'POST',
            data :{
                'event_name' : $("#event_name").val(),
                'event_date' : $("#event_date").val(),
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

    function delEvent(id){
        $.ajax({
            url : "{{ url('event/delete') }}/"+id,
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

    function updatePayment(id,status){
        $.ajax({
            url : "{{ url('ticket/payment') }}/"+id+"/"+status,
            method : "GET",
            dataType : "JSON",
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
