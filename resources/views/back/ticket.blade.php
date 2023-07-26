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
                          <label class="visually-hidden" for="example-if-email">Customer Name</label>
                          <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Name">
                          <small class="text-danger" id="notif_customer_name"></small>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xl-3">
                            <label class="visually-hidden" for="example-if-email">HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Handphone">
                            <small class="text-danger" id="notif_no_hp"></small>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xl-3">
                            <label class="visually-hidden" for="example-if-email">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" min="1">
                            <small class="text-danger" id="notif_quantity"></small>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xl-3">
                            <label class="visually-hidden" for="example-if-email">Order Date</label>
                            <input type="date" class="form-control" id="order_date" name="order_date" placeholder="Order Date">
                            <small class="text-danger" id="notif_order_date"></small>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xl-3">
                            <label class="visually-hidden" for="example-if-email">Ticket Type</label>
                            <select name="ticket_type" id="ticket_type" class="form-control">
                                <option value="">-- Choose Ticket Type--</option>
                                <option value="PRESALE">Pre-Sale</option>
                                <option value="BUNDLING">Bundling</option>
                            </select>
                            <small class="text-danger" id="notif_ticket_type"></small>
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
                      <h3 class="block-title">Ticket list</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="row">
                            <div class="col-12 mb-3 align-right">
                                <a href="{{ url('scan') }}" class="btn btn-success"><i class="fas fa-search"></i> Scanner</a>
                            </div>
                        </div>
                      <div class="row">
                        <div class="col-lg-12 space-y-2">
                          <table class="table table-striped table-responsive" id="tableTicket" width="100%">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Customer Name</th>
                                <th>HP</th>
                                <th>Ticket Type</th>
                                <th>Qty</th>
                                <th>Status</th>
                                <th>Order Date</th>
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
                url: '{{ url("ticket/load") }}'
            },
            columns: [
                { name: 'DT_RowIndex', data: 'DT_RowIndex', orderable: false, searchable: false },
                { name: 'customer_name', data: 'customer_name'},
                { name: 'no_hp', data: 'no_hp'},
                { name: 'ticket_type', data: 'ticket_type'},
                { name: 'quantity', data: 'quantity'},
                { name: 'ticket_status', data: 'ticket_status'},
                { name: 'order_date', data: 'order_date'},
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
            url : "{{ url('ticket/create') }}",
            method : 'POST',
            data :{
                'customer_name' : $("#customer_name").val(),
                'no_hp' : $("#no_hp").val(),
                'quantity' : $("#quantity").val(),
                'ticket_type' : $("#ticket_type").val(),
                'order_date' : $("#order_date").val(),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(e){
                if(e.status == 'success'){
                    $("#customer_name").val('').focus();
                    $("#no_hp").val('');
                    $("#quantity").val('');
                    $("#ticket_type").val('');
                    $("#order_date").val('');
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
            url : "{{ url('ticket/edit') }}/"+id,
            method : 'GET',
            dataType : 'JSON',
            success:function(e){
                $("#customer_name").val(e.data.customer_name).focus();
                $("#no_hp").val(e.data.no_hp);
                $("#quantity").val(e.data.quantity);
                $("#ticket_type").val(e.data.ticket_type).trigger('change');
                $("#btnUpdate").attr('onclick','update('+e.data.id_ticket+')')
            }
        })
    }

    function update(id){
        $.ajax({
            url : "{{ url('genre/update') }}/"+id,
            method : 'POST',
            data :{
                'customer_name' : $("#customer_name").val(),
                'no_hp' : $("#no_hp").val(),
                'quantity' : $("#quantity").val(),
                'ticket_type' : $("#ticket_type").val(),
                'order_date' : $("#order_date").val()
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

    function delTicket(id){
        $.ajax({
            url : "{{ url('ticket/delete') }}/"+id,
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
