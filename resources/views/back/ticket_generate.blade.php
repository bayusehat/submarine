<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{'ID : '. $data->id_ticket.'- NO:'.$data->no_ticket.'/'.$data->customer_name.'/'.$data->no_hp}}</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('assets_back/js/codebase.app.min.js') }}"></script>
    <!-- Page JS Plugins -->
    <script src="{{ asset('assets_back/js/plugins/chart.js/chart.umd.js') }}"></script>
    <!-- Page JS Code -->
    <script src="{{ asset('assets_back/js/pages/db_classic.min.js') }}"></script>
    <link rel="stylesheet" id="css-main" href="{{ asset('assets_back/css/codebase.min.css') }}">
    <script src="{{ asset('assets_back/js/html2pdf.js') }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }

        th {
            padding: 5px;
        }

        tr {
            background-color: white;
        }

        td {
            white-space: normal !important;
            word-wrap: break-word;
        }

        table {
            table-layout: fixed;
        }
    </style>
</head>
<body>
    <div id="container" class="container align-items-center justify-content-center">
        <div class="row mb-3">
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="{{ url('ticket') }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                    <a href="javascript:void(0)" class="btn btn-success" onclick="verify({{ $data->id_ticket }},'{{$data->ticket_status}}')"><i class="fas fa-checkbox"></i> Verify Ticket</a>
                    <a href="javascript:void(0)" class="btn btn-primary" onclick="generateTicket()"><i class="fas fa-file"></i> Generate Ticket</a>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12 col-sm-12 col-xl-12">
                <table id="tableTicket" style="border: 5px solid white;border-collapse: collapse;">
                    @if ($data->id_event == 1)
                        <td><img src="{{ asset('assets_back/media/photos/logo-sub.png') }}" width="100px"/></td>
                    @else
                        <td><img src="{{ asset('assets_back/media/photos/logo.jpg') }}" width="100px"/></td>
                    @endif
                    <td></td>
                    <td>{{ 'ID : '. $data->id_ticket.'- NO:'.$data->no_ticket }}</td>
                </tr>
                <tr>
                    @php
                        $link = url('generate/'.$data->id_ticket);
                    @endphp
                    <td>Nama</td>
                    <td>: {{ $data->customer_name }}</td>
                    <td rowspan="4" align="right">{!! QrCode::generate($data->id_ticket) !!}</td>
                </tr>
                <tr>
                    <td>HP</td>
                    <td>: {{ $data->no_hp }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Jml Ticket</td>
                    <td>: {{ $data->quantity }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Jenis Tiket</td>
                    <td>: {{ $data->ticket_type }}</td>
                    <td></td>
                </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xl-3">
                <h3>TICKET STATUS : </h3>
            </div>
            <div class="col-md-3 col-sm-12 col-xl-3">
                @if ($data->ticket_status == 'NOT CHECKED')
                    <span class="alert alert-danger"><i class="fas fa-times"></i> {{ $data->ticket_status }}</span>
                @else
                    <span class="alert alert-success"><i class="fas fa-check"></i> {{ $data->ticket_status }}</span>
                @endif
            </div>
        </div>
    </div>
    <script>
        var id = '{{ $data->id_ticket }}';
        var ts = '{{ $data->ticket_status }}';
        function generateTicket(){
            html2canvas(document.querySelector("#tableTicket")).then(canvas => {
            var anchor = document.createElement("a");
            anchor.href = canvas.toDataURL("image/png");
            anchor.download = document.title+".png";
            anchor.click();
        });
        }

        function verify(id,ts){
            $.ajax({
                url : '{{ url("verify") }}/'+id+'/'+ts,
                method : 'GET',
                success:function(e){
                    if(e.status == 'success'){
                        window.location.reload();
                    }else{
                        alert(e.message);
                    }
                }
            })
        }
    </script>
</body>
</html>
