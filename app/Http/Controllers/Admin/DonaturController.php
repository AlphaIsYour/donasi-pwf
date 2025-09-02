<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donatur;

class DonaturController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $donaturs = Donatur::latest()->when(request()->q, function($donaturs) {
            $donaturs = $donaturs->where('name', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.donatur.index', compact('donaturs'));
    }
}
