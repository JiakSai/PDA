<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse; // Import your model

class WarehouseController extends Controller
{
    public function warehouse()
    {
        // Query the database to get warehouse names
        $warehouses = Warehouse::all(); // Adjust the query as needed
        return view('warehouse', ['warehouses' => $warehouses]);
    }
}
