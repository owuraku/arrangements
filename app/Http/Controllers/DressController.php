<?php

namespace App\Http\Controllers;

use App\Models\Dress;
use Illuminate\Http\Request;

class DressController extends Controller
{
    //
    public function index()
    {
        $dresses = Dress::paginate(15);
        return view('dress.index')->with('dresses', $dresses);
    }

     public function show($id)
    {
        $dress = Dress::findOrFail($id);
        return view('dress.show')->with('dress', $dress);
    }

    public function updateView($id)
    {
        $dress = Dress::findOrFail($id)->with('arrangements');
        return view('dress.form')->with('dress', $dress);
    }
}
