 <!-- Main Container -->
 <main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xl-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                      <h3 class="block-title">Fill data Invoice</h3>
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
                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Failed!</strong> {{ Session::get('error')}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>
                        </div>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 space-y-2">
                            <form method="post" action="{{ url('invoice/insert') }}" id="formCreate" enctype="multipart/form-data"
                            class="row gx-3 gy-2 align-items-center">
                            @csrf
                                <div class="col-sm-3">
                                    <label for="specificSizeInputName">Name</label>
                                    <input type="text" name="invoice_to" class="form-control" id="invoice_to" placeholder="Jane Doe">
                                </div>
                                <div class="col-sm-3">
                                    <label for="specificSizeInputGroupUsername">Contact Person</label>
                                    {{-- <div class="input-group">
                                    <div class="input-group-text">@</div> --}}
                                    <input type="text" name="invoice_cp" class="form-control" id="invoice_cp" placeholder="0895364791632">
                                    {{-- </div> --}}
                                </div>
                                <div class="col-sm-3">
                                    <label for="specificSizeInputName">Invoice Date</label>
                                    <input type="date" name="invoice_date" class="form-control" id="invoice_date" placeholder="Fill the date">
                                </div>
                                <div class="col-sm-3">
                                    <label for="specificSizeInputName">Invoice E-mail</label>
                                    <input type="date" name="invoice_email" class="form-control" id="invoice_email" placeholder="business@mail.com">
                                </div>
                                <div class="col-sm-3">
                                    <label for="specificSizeInputName">Description</label>
                                    <textarea name="invoice_description" id="invoice_description" class="form-control" ></textarea>
                                </div>
                                <div class="col-sm-3">
                                    <label for="specificSizeInputName">Address</label>
                                    <textarea name="invoice_address" id="invoice_address" class="form-control"></textarea>
                                </div>
                                <div class="col-sm-3">
                                    <label for="specificSizeInputName"><strong>Amount</strong></label>
                                    <input type="text" name="invoice_amount" class="form-control" id="invoice_amount" placeholder="" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="specificSizeInputName"><strong>Total</strong></label>
                                    <input type="text" name="invoice_total" class="form-control" id="invoice_total" placeholder="" readonly>
                                </div>
                                <hr>
                                <div class="list">
                                    <table class="table table-responsive table-bordered" id="tableItem">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Note</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Subtotal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableContent">

                                        </tbody>
                                    </table>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="button" class="btn btn-info me-md-2" class="btnAddItem" id="btnAddItem"onclick="addItem()"><i class="fas fa-plus"></i> Add new Item</button>
                                        <input type="submit" class="btn btn-success me-md-2" value="Generate Invoice">
                                    </div>
                                </div>
                            </form>
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
    function addItem(){
    var list = '<tr>'+
                '<td><input type="text" name="item[]" class="form-control"></td>'+
                '<td><input type="text" name="note[]" class="form-control"></td>'+
                '<td><input type="number" name="quantity[]" onchange="change_qty()" class="form-control quantity" min="1"></td>'+
                '<td><input type="text" name="price[]" onchange="change_price()" class="form-control price"></td>'+
                '<td><input type="text" name="subtotal[]" class="form-control subtotal" readonly></td>'+
                '<td><button type="button" class="btn btn-danger actionBtn"><i class="fas fa-trash"></i></button></td>'+
        '</tr>';
    $("#tableContent").append(list);
    }

    $("#tableItem").on('click', '.actionBtn', function() {
        $(this).closest('tr').remove();
    })

    function change_qty(){
        var sum = 0;
    $('#tableItem > tbody  > tr').each(function() {
        var qty = $(this).find('.quantity').val();
        var price = $(this).find('.price').val();
        var amount = (qty*price)
        sum+=amount;
        $(this).find('.subtotal').val(amount);
        total();
    });
    }

    function change_price(){
        var sum = 0;
    $('#tableItem > tbody  > tr').each(function() {
        var qty = $(this).find('.quantity').val();
        var price = $(this).find('.price').val();
        var amount = (qty*price)
        sum+=amount;
        $(this).find('.subtotal').val(amount);
        total();
    });
    }

    function total(){
        var sum = 0;
        $(".subtotal").each(function() {
            var value = $(this).val();

            if(!isNaN(value) && value.length != 0) {
                sum += parseFloat(value);
            }
        });
        $("#invoice_total").val(sum);
    }

</script>
