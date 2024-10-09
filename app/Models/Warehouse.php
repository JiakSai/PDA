<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'WAREHOUSE'; // Set your warehouse table name
    protected $primaryKey = 'Id'; // Adjust this if your primary key is different
    public $timestamps = false; // If your table doesn't use timestamps
}