<?php

// Assuming you have a database connection established

// Get the authentication token from the HttpOnly cookie
$cookieTicket = isset($_COOKIE['auth_ticket']) ? $_COOKIE['auth_ticket'] : null;
if ($cookieTicket) {
   
    require($_SERVER["DOCUMENT_ROOT"] . '/inforLN/connection/dbcon.php');
    $sqlCheck = "SELECT Redirect_url FROM [erplivedb_customer].[dbo].[USERS_PROFILE] WHERE Ticket = ?";
    $paramsCheck = array($cookieTicket);
    
    $stmtCheck = sqlsrv_query($conn, $sqlCheck, $paramsCheck);
    $row = sqlsrv_fetch_array($stmtCheck, SQLSRV_FETCH_ASSOC);
    
    if ($stmtCheck === false) {
        // Handle database query error
        die("Error executing query: " . print_r(sqlsrv_errors(), true));
    }

    header("Location: ".$row['Redirect_url'] , true, 301); 
    exit();
}

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark" class="bg-cover-1">

<head>
    <meta charset="utf-8" />
    <title>SMTT | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="PDA" />
    <meta name="author" content="JH Chen" />
    <link rel="icon" type="image/png" href="{{asset('img/genitronic.png') }}" />
    <link href="{{asset('css/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{asset('css/app.min.css') }}" rel="stylesheet" />
   
</head>


<body class="pace-done pace-top app-init theme-warning">
    <div class="pace pace-inactive">
        <div class="pace-progress" data-progress-text="100%" data-progress="99"
            style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>

    <div id="app" class="app app-full-height app-without-header">
        <div class="position-relative">
            <a href="#" onclick="modal('{{route('changeURL')}}', 2)" class="position-absolute top-0 start-0" style="padding-left: 10px;padding-top:10px;color:rgba(255, 255, 255, 0.75)"><i class="bi bi-three-dots-vertical fa-xl"></i></a> 
        </div>
        <div class="login">

            <div class="login-content">

                <h1 class="text-center">Sign In</h1>
                <div class="text-inverse text-opacity-50 text-center mb-4">
                    For your protection, please verify your identity.
                </div>
                <div class="mb-3">
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="3"><img src="{{asset('img/genitronic.png')}}"    class="card-img-top" /></th>
                                </tr>
                                <tr>
                                    <th scope="col" colspan="3">
                                        <input type="number" class="form-control form-control-lg"  placeholder="Employee ID(XXXXX)" name="employeeID" id="employeeID">
                                        @error('employeeID')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </th>
                                
                                </tr>
                                <tr>
                                    <th scope="col" colspan="3">
                                        <input type="password" class="form-control form-control-lg"  placeholder="Password" name="password" id="password">
                                        @error('employeeID')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </th>
                                
                                </tr>
                                <tr>
                                    <th scope="col" colspan="3" class="text-center">
                                    <button type="submit" class="btn btn-primary">FG Warehouse</a>
                                    
                                    </th>
                                
                                </tr>
                                <tr>
                                    <th scope="col" colspan="3">
                                    
                                        <div id="otpMessage"></div>
                                        <div id="reader"></div>
                                    </th>
                                
                                </tr>
                            </thead>
                        </table>
                    </form>
                </div>
                <div class="modal fade" id="modal" data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                        <div class="modal-content" id="modalContent">
                            <div class="text-center">
                                <div class="spinner-border" style="width: 5rem; height: 5rem;" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

    <script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
    <script src="{{asset('js/vendor.min.js')}}"></script>
    <script src="{{asset('js/app.min.js')}}"></script>
    <script src="{{asset('js/html5-qrcode.min.js')}}"></script>
    <!-- <script src="assets/js/jquery.inputmask.min</script> -->
</body>

</html>

<script>
    $(document).ready(function () {

        $("#employeeID").focus();
        $("#employeeID").keydown(function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
                $("#scanButton").click();
            }
        });

        $("#emailButton, #telegramButton").click(function () {
           
            var $this = $(this); // Declare $this using var, let, or const
            $this.attr("disabled", true);
            $this.find(".spinner-border").removeClass('d-none');
            $('#reader').html('');
          
            $.ajax({
                type: "POST",
                url: "auth.php",
                data: { employeeID: $('#employeeID').val(), category:$this.text() },
                success: function (d) {
                    if (d.type === 1) {
                        $('#reader').html(d.message)
                    }
                    else
                    {
                        $('#otpMessage').html(d.message)
                        $("#telegramButton, #emailButton, #employeeID").addClass('d-none');
                        $("#refreshButton, #loginButton").removeClass('d-none');
                    }
                  
                    $this.attr("disabled",false);
                    $(".spinner-border").addClass('d-none');
                },
                error: function (xhr, status, error) {
                    console.log('AJAX Error:', xhr, status, error);
                    alert('Error: ' + error.message);
                }
            });
        });

        $("#loginButton").click(function () {
            var formData = new FormData(document.getElementById('otpForm'));
            formData.append('employeeID', $('#employeeID').val());
            // Example: Send data to the backend using Fetch API
            fetch('login.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                    
                    $('#otpReturnMessage').html(data.message)
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    });

    function modal(route,id) {
        $.ajax({
            method: "POST",
            url: route,
            dataType: 'json',
            data: { 
                id: id,
                _token: '{{ csrf_token() }}' // Include the CSRF token
            },
            success: function (d) {
                $('#modalContent').html(d.data);
                $('#modal').modal('show'); 
            },
            error: function (xhr, status, error) {
                alert('Error: ' + error.message);
                $("#modal").modal('hide');
            }
        });
    }

</script>