<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <!-- Head section remains the same -->
</head>
<body>
    <div id="app" class="app app-sidebar-collapsed">
        @include('topbar') 
        @include('slider') 

        <div id="content" class="app-content">
            <div class="row mb-3">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <h4>Warehouse</h4>
                        <p>Please select warehouse</p>
                    </div>
                </div>
            </div>

            <div class="row mb-3" id="warehouse">
                <ul>
                    @foreach($warehouses as $warehouse)
                        <li>{{ $warehouse->name }}</li> <!-- Adjust the field name as per your DB -->
                    @endforeach
                </ul>
            </div>
        </div>

        <script src="{{asset('js/vendor.min.js')}}"></script>
        <script src="{{asset('js/app.min.js')}}"></script>
        <script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
        <script src="{{asset('js/qrcode.js')}}"></script>
        <script src="{{asset('js/warehouse.js')}}"></script>
    </div>
</body>
</html>
