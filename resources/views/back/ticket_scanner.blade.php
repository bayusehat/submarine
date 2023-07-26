<!DOCTYPE html>
<html>
<head>
	<title>Ticket Scanner</title>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="{{ asset('assets_back/js/scan.js')}}"></script>
    <script src="{{ asset('assets_back/js/notify.js')}}"></script>
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
                        $.notify(e.message, "success",{position:"left top"});
                    }else{
                        $.notify(e.message, "error",{position:"left top"});
                    }
                }
            })
        });

        });
    </script>

</body>
</html>
