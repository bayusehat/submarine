 <!-- Main Container -->
 <main id="main-container">
    <!-- Page Content -->
    <div class="content">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title"> Invoice List</h3>
                </div>
                <div class="block-content block-content-full">
                  <div class="row">
                    <div class="col-lg-8 space-y-2">
                      <!-- Form Inline - Default Style -->
                      <a href="{{ url('invoice/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Create</a>
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
                      <h3 class="block-title">Invoice list</h3>
                    </div>
                    <div class="block-content block-content-full">
                      <div class="row">
                        <div class="col-lg-12 space-y-2">
                          <table class="table table-striped" id="tableGenre">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Invoice Date</th>
                                <th>Invoice To</th>
                                <th>Amount</th>
                                <th>Total</th>
                                <th>Status</th>
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
                url: '{{ url("invoice/load") }}'
            },
            columns: [
                { name: 'DT_RowIndex', data: 'DT_RowIndex', orderable: false, searchable: false },
                { name: 'invoice_date', data: 'invoice_date'},
                { name: 'invoice_to', data: 'invoice_to'},
                { name: 'invoice_amount', data: 'invoice_amount'},
                { name: 'invoice_total', data: 'invoice_total'},
                { name: 'invoice_status', data: 'invoice_status'},
                { name: 'action' , data: 'action'}
            ],
            lengthMenu: [10,50,-1],
            order: [[0, 'desc']],
        });

  </script>
