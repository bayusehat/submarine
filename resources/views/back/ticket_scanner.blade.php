<!DOCTYPE html>
<html>
<head>
	<title>Ticket Scanner</title>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="{{ asset('assets_back/js/scan.js')}}"></script>
    <script src="{{ asset('assets_back/js/notify.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container justify-content-center align-center">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xl-4">
                <video id="preview" width="100%" height="100%"></video>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // $(document).ready(function(){
        //     Swal.fire({
        //         title: 'Error!',
        //         text: 'Do you want to continue',
        //         icon: 'error',
        //         confirmButtonText: 'Cool'
        //     })
        // })
        document.addEventListener("DOMContentLoaded", event => {
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror:false });
        Instascan.Camera.getCameras().then(cameras => {
            scanner.camera = cameras[cameras.length - 1];
            scanner.start();
        }).catch(e => console.error(e));

        scanner.addListener('scan', content => {
            $.ajax({
                url: '{{ url("scan") }}/'+content,
                method : 'GET',
                success:function(e){
                    if(e.status == 'success'){
                        Swal.fire({
                            title: 'Ticket Checked!',
                            text: 'Thanks for your support',
                            icon: 'success',
                            confirmButtonText: 'Back'
                        })
                    }else{
                        Swal.fire({
                            title: 'Error!',
                            text: 'Any problem was here',
                            icon: 'error',
                            confirmButtonText: 'Back'
                        })
                    }
                }
            })
        });

        });
    </script>

</body>
</html>
