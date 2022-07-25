<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

    class InventoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Illuminate\Http\Request $request [product_name, vendor_name, price, sort= column, sort_type]
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        dd('omar');
    }
}
