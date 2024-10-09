<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8" />
    <title>SMTT | Warehouse management system</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/png" href="../../assets/img/company.png">
    <link href="{{asset('css/vendor.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/app.min.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/jvectormap-next/jquery-jvectormap.css')}}" rel="stylesheet" />

</head>

<style>
</style>

<body>

    <div id="app" class="app app-sidebar-collapsed">

        {{-- <x-topbar />
        <x-slidebar /> --}}

        <button class="app-sidebar-mobile-backdrop" data-toggle-target=".app"
            data-toggle-class="app-sidebar-mobile-toggled"></button>
        <div id="content" class="app-content">
            <div class="row" id="todayWO">
                <div class="col-lg-12">
                    <div id="statsWidget" class="mb-5">
                        <h4>Genitronic Warehouse Management System</h4>
                        <p>To manage GTR raw material warehouse</p>
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    @foreach ($modules as $module)
                                        <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                            <a href="#" class="card text-decoration-none h-100">
                                                <div
                                                    class="card-body d-flex align-items-center text-inverse m-5px bg-inverse bg-opacity-10">
                                                    <div class="flex-fill">
                                                        <div class="mb-1"></div>
                                                        <h2>{{ $module->Name }}</h2>
                                                        <div>{{ $module->Description }}</div>
                                                    </div>
                                                    <div class="opacity-5">
                                                        <i class="{{ $module->Icon }} fa-4x"></i>
                                                    </div>
                                                </div>
                                                <div class="card-arrow">
                                                    <div class="card-arrow-top-left"></div>
                                                    <div class="card-arrow-top-right"></div>
                                                    <div class="card-arrow-bottom-left"></div>
                                                    <div class="card-arrow-bottom-right"></div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                    {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                        <a href="#" class="card text-decoration-none h-100" data-bs-toggle="modal" 
                                        data-bs-target="#exampleModal" onClick="modal('1')">
                                            <div
                                                class="card-body d-flex align-items-center text-inverse m-5px bg-inverse bg-opacity-10">
                                                <div class="flex-fill">
                                                    <div class="mb-1"></div>
                                                    <h2>RFID Label</h2>
                                                    <div>To print RFID Label</div>
                                                </div>
                                                <div class="opacity-5">
                                                <i class="bi bi-qr-code fa-4x"></i>
                                                </div>
                                            </div>
                                            <div class="card-arrow">
                                                <div class="card-arrow-top-left"></div>
                                                <div class="card-arrow-top-right"></div>
                                                <div class="card-arrow-bottom-left"></div>
                                                <div class="card-arrow-bottom-right"></div>
                                            </div>
                                        </a>
                                    </div> --}}
                                    {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                    <a class="card text-decoration-none h-100" href="WarehouseReceipt/warehouse_receive">
                                            <div
                                                class="card-body d-flex align-items-center text-inverse m-5px bg-inverse bg-opacity-10">
                                                <div class="flex-fill">
                                                    <div class="mb-1"></div>
                                                    <h2>Warehouse Receive</h2>
                                                    <div>Receiving Goods from supplier</div>
                                                </div>
                                                <div class="opacity-5">
                                                    <i class="bi bi-upc-scan fa-4x"></i>
                                                </div>
                                            </div>
                                            <div class="card-arrow">
                                                <div class="card-arrow-top-left"></div>
                                                <div class="card-arrow-top-right"></div>
                                                <div class="card-arrow-bottom-left"></div>
                                                <div class="card-arrow-bottom-right"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                        <a class="card text-decoration-none h-100" href="disassemble_part.php">
                                            <div
                                                class="card-body d-flex align-items-center text-inverse m-5px bg-inverse bg-opacity-10">
                                                <div class="flex-fill">
                                                    <div class="mb-1"></div>
                                                    <h2>Disassemble Part</h2>
                                                    <div>Separate Good into diffirent Pac</div>
                                                </div>
                                                <div class="opacity-5">
                                                    <i class="fa fa-window-restore fa-4x"></i>
                                                </div>
                                            </div>
                                            <div class="card-arrow">
                                                <div class="card-arrow-top-left"></div>
                                                <div class="card-arrow-top-right"></div>
                                                <div class="card-arrow-bottom-left"></div>
                                                <div class="card-arrow-bottom-right"></div>
                                            </div>
                                        </a>
                                    </div> 
                                    <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                        <a class="card text-decoration-none h-100" href="warehouse_issue.php">
                                            <div
                                                class="card-body d-flex align-items-center text-inverse m-5px bg-inverse bg-opacity-10">
                                                <div class="flex-fill">
                                                    <div class="mb-1"></div>
                                                    <h2>Warehouse Issuing</h2>
                                                    <div>Issuing Goods To Production</div>
                                                </div>
                                                <div class="opacity-5">
                                                    <i class="fa fa-exchange fa-4x"></i>
                                                </div>
                                            </div>
                                            <div class="card-arrow">
                                                <div class="card-arrow-top-left"></div>
                                                <div class="card-arrow-top-right"></div>
                                                <div class="card-arrow-bottom-left"></div>
                                                <div class="card-arrow-bottom-right"></div>
                                            </div>
                                        </a>
                                    </div> --}}
                               
                                    <!-- <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                    <a class="card text-decoration-none h-100" href="balance_receive.php">
                                            <div
                                                class="card-body d-flex align-items-center text-inverse m-5px bg-inverse bg-opacity-10">
                                                <div class="flex-fill">
                                                    <div class="mb-1"></div>
                                                    <h2>Balance Receive</h2>
                                                    <div>Receiving Goods from Production</div>
                                                </div>
                                                <div class="opacity-5">
                                                    <i class="bi bi-qr-code-scan fa-4x"></i>
                                                </div>
                                            </div>
                                            <div class="card-arrow">
                                                <div class="card-arrow-top-left"></div>
                                                <div class="card-arrow-top-right"></div>
                                                <div class="card-arrow-bottom-left"></div>
                                                <div class="card-arrow-bottom-right"></div>
                                            </div>
                                        </a>
                                    </div> -->

                                    {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                        <a href="#" class="card text-decoration-none h-100" data-bs-toggle="modal" 
                                        data-bs-target="#exampleModal" onClick="modal('4')">
                                            <div
                                                class="card-body d-flex align-items-center text-inverse m-5px bg-inverse bg-opacity-10">
                                                <div class="flex-fill">
                                                    <div class="mb-1"></div>
                                                    <h2>Location Control</h2>
                                                    <div>To register Location</div>
                                                </div>
                                                <div class="opacity-5">
                                                <i class="bi bi-bounding-box fa-4x"></i>
                                                </div>
                                            </div>
                                            <div class="card-arrow">
                                                <div class="card-arrow-top-left"></div>
                                                <div class="card-arrow-top-right"></div>
                                                <div class="card-arrow-bottom-left"></div>
                                                <div class="card-arrow-bottom-right"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                    <a class="card text-decoration-none h-100" href="location_scan_in3.php">
                                            <div
                                                class="card-body d-flex align-items-center text-inverse m-5px bg-inverse bg-opacity-10">
                                                <div class="flex-fill">
                                                    <div class="mb-1"></div>
                                                    <h2>Location Scan IN</h2>
                                                    <div>Receiving Good to Location</div>
                                                </div>
                                                <div class="opacity-5">
                                                    <i class="fa fa-sign-in fa-4x"></i>
                                                </div>
                                            </div>
                                            <div class="card-arrow">
                                                <div class="card-arrow-top-left"></div>
                                                <div class="card-arrow-top-right"></div>
                                                <div class="card-arrow-bottom-left"></div>
                                                <div class="card-arrow-bottom-right"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                    <a class="card text-decoration-none h-100" data-bs-toggle="modal" 
                                        data-bs-target="#exampleModal" onClick="modal('4')">
                                            <div
                                                class="card-body d-flex align-items-center text-inverse m-5px bg-inverse bg-opacity-10">
                                                <div class="flex-fill">
                                                    <div class="mb-1"></div>
                                                    <h2>Location Transfer</h2>
                                                    <div>Transfer Goods form Location A to Location B</div>
                                                </div>
                                                <div class="opacity-5">
                                                    <i class="fa fa-exchange fa-4x"></i>
                                                </div>
                                            </div>
                                            <div class="card-arrow">
                                                <div class="card-arrow-top-left"></div>
                                                <div class="card-arrow-top-right"></div>
                                                <div class="card-arrow-bottom-left"></div>
                                                <div class="card-arrow-bottom-right"></div>
                                            </div>
                                        </a>
                                    </div> --}}
                                    
                                    <!-- <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                    <a class="card text-decoration-none h-100" href="location_map.php">
                                            <div
                                                class="card-body d-flex align-items-center text-inverse m-5px bg-inverse bg-opacity-10">
                                                <div class="flex-fill">
                                                    <div class="mb-1"></div>
                                                    <h2>Location Map</h2>
                                                    <div>Show the real location Map</div>
                                                </div>
                                                <div class="opacity-5">
                                                    <i class="fa-solid fa-sitemap fa-4x"></i>
                                                </div>
                                            </div>
                                            <div class="card-arrow">
                                                <div class="card-arrow-top-left"></div>
                                                <div class="card-arrow-top-right"></div>
                                                <div class="card-arrow-bottom-left"></div>
                                                <div class="card-arrow-bottom-right"></div>
                                            </div>
                                        </a>
                                    </div> -->
                                    {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                        <a class="card text-decoration-none h-100" href="reporting.php">
                                            <div
                                                class="card-body d-flex align-items-center text-inverse m-5px bg-inverse bg-opacity-10">
                                                <div class="flex-fill">
                                                    <div class="mb-1"></div>
                                                    <h2>Reporting</h2>
                                                    <div>Show the Goods need to entry in InforLN</div>
                                                </div>
                                                <div class="opacity-5">
                                                    <i class="bi bi-file-earmark-spreadsheet fa-4x"></i>
                                                </div>
                                            </div>
                                            <div class="card-arrow">
                                                <div class="card-arrow-top-left"></div>
                                                <div class="card-arrow-top-right"></div>
                                                <div class="card-arrow-bottom-left"></div>
                                                <div class="card-arrow-bottom-right"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                        <a class="card text-decoration-none h-100" href="rfid_check.php">
                                            <div
                                                class="card-body d-flex align-items-center text-inverse m-5px bg-inverse bg-opacity-10">
                                                <div class="flex-fill">
                                                    <div class="mb-1"></div>
                                                    <h2>Tracking</h2>
                                                    <div>Search rfid & Partnumber History</div>
                                                </div>
                                                <div class="opacity-5">
                                                    <i class="bi bi-search fa-4x"></i>
                                                </div>
                                            </div>
                                            <div class="card-arrow">
                                                <div class="card-arrow-top-left"></div>
                                                <div class="card-arrow-top-right"></div>
                                                <div class="card-arrow-bottom-left"></div>
                                                <div class="card-arrow-bottom-right"></div>
                                            </div>
                                        </a>
                                    </div> 
                                    <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                        <a class="card text-decoration-none h-100" href="kanban.php">
                                            <div
                                                class="card-body d-flex align-items-center text-inverse m-5px bg-inverse bg-opacity-10">
                                                <div class="flex-fill">
                                                    <div class="mb-1"></div>
                                                    <h2>KanBan</h2>
                                                    <div>Show the kanban of WMS</div>
                                                </div>
                                                <div class="opacity-5">
                                                    <i class="bi bi-speedometer2 fa-4x"></i>
                                      
                                                </div>
                                            </div>
                                            <div class="card-arrow">
                                                <div class="card-arrow-top-left"></div>
                                                <div class="card-arrow-top-right"></div>
                                                <div class="card-arrow-bottom-left"></div>
                                                <div class="card-arrow-bottom-right"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                        <a class="card text-decoration-none h-100" href="tools.php">
                                            <div
                                                class="card-body d-flex align-items-center text-inverse m-5px bg-inverse bg-opacity-10">
                                                <div class="flex-fill">
                                                    <div class="mb-1"></div>
                                                    <h2>Tools</h2>
                                                    <div>Utility for optimization</div>
                                                </div>
                                                <div class="opacity-5">
                                                    <i class="bi bi-tools fa-4x"></i>
                                      
                                                </div>
                                            </div>
                                            <div class="card-arrow">
                                                <div class="card-arrow-top-left"></div>
                                                <div class="card-arrow-top-right"></div>
                                                <div class="card-arrow-bottom-left"></div>
                                                <div class="card-arrow-bottom-right"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                        <a class="card text-decoration-none h-100" href="{{route('warehouseControl')}}">
                                            <div
                                                class="card-body d-flex align-items-center text-inverse m-5px bg-inverse bg-opacity-10">
                                                <div class="flex-fill">
                                                    <div class="mb-1"></div>
                                                    <h2>Warehouse Control</h2>
                                                    <div>Warehouse Control</div>
                                                </div>
                                                <div class="opacity-5">
                                                    <i class="bi bi-sliders2 fa-4x"></i>
                                                </div>
                                            </div>
                                            <div class="card-arrow">
                                                <div class="card-arrow-top-left"></div>
                                                <div class="card-arrow-top-right"></div>
                                                <div class="card-arrow-bottom-left"></div>
                                                <div class="card-arrow-bottom-right"></div>
                                            </div>
                                        </a>
                                    </div>    --}}
                                               
                            </div>
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

         
            <!-- Modal -->
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

            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="liveToast" class="toast text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body" id="toastMessage">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            <span class="sr-only">Loading...</span>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            
        </div>
        {{-- <div class="ms-auto">
            <a href="{{route('moduleControl')}}" class="btn btn-outline-theme" "><i class="bi bi-gear-fill"></i> Module Control</a> 
        </div> --}}
    </div>
            {{-- <x-rocket_loader /> --}}
            <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

            <script src="{{asset('js/vendor.min.js')}}"></script>
            <script src="{{asset('js/app.min.js')}}"></script>
            <script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
            <!-- <script src="../../assets/js/JsBarcode.all.js"></script> -->
            <script src="{{asset('js/qrcode.js')}}"></script>
            <script src="{{asset('js/moment.min.js')}}"></script>
            {{-- <script src="{{asset('js/index.js')}}"></script> --}}

</body>

</html>