<?php

namespace App\Http\Controllers;

use App\Models\Arrangement;
use Illuminate\Http\Request;

class ArrangementController extends Controller
{
    //
    public function edit($id)
    {
        $arrangment = Arrangement::findOrFail($id);
        return view('arrangements.edit')->with('arrangement', $arrangment);
    }

     public function view($id)
    {
        $arrangments = Arrangement::findOrFail($id);
        return view('arrangements.form')->with('arrangement', $arrangments);
    }

     public function index()
    {
        $arrangments = Arrangement::paginate(15);
        return view('arrangements.index')->with('arrangements', $arrangments);
    }

     public function new()
    {
        $arrangment = new Arrangement;
        return view('arrangements.new')->with('arrangements', $arrangment);
    }

     public function store(Request $request)
    {
        $arrangment = new Arrangement;
        $arrangment->name = $request->name;
        $arrangment->save();
        return redirect(route('arrangements.index'));
    }

    public function submit(){

    }
}
