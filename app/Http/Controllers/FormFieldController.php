<?php

namespace App\Http\Controllers;

use App\Models\Arrangement;
use App\Models\FormFields;
use App\Models\FormFieldType;
use Illuminate\Http\Request;

class FormFieldController extends Controller
{
    //
    public function show($id)
    {
       $formfieldDetails = FormFields::findOrFail($id);
       $formtypes = FormFieldType::all();
       return view('formfields.add-edit')
            ->with('formfield', $formfieldDetails)
            ->with('edit', true)
            ->with('formtypes', $formtypes);

    }

    public function new($arrangement_id)
    {
       $formfieldDetails = new FormFields();
       $formtypes = FormFieldType::all();
       return view('formfields.add-edit')
            ->with('formfield', $formfieldDetails)
            ->with('edit', false)
            ->with('arrangement_id', $arrangement_id)
            ->with('formtypes', $formtypes);

    }

    public function updatePositions(Request $request){

        foreach($request->data as $id => $position){
            $formField = FormFields::findOrFail($id);
            $formField->position = $position;
            $formField->save();
        }

        return response()->json(['message' => 'Successful']);
    }


    public function update(Request $request){

        $formField = FormFields::findOrFail($request->id);

        if($request->hasFile('image')){
            $path = $request->file('image')->store('/public');
            $formField->imagelink = $path;
        }

         $formField->name = $request->name;
         $formField->description = $request->description;
         $formField->placeholder = $request->placeholder;
         $formField->class = $request->class;
         $formField->formfield_type_id = $request->input_type;
         $formField->is_input_text = $request->is_input_text;
         $formField->min = $request->min;
         $formField->max = $request->max;
         $formField->options = preg_split("/\\r\\n|\\r|\\n/", $request->options);
         $formField->videolink = $request->videolink;
        $formField->save();
        return back();
    }

     public function delete($id){
            $formField = FormFields::findOrFail($id);
            $formField->delete();
        return response()->json(['success' => true]);
    }

     public function save(Request $request){
        $formField = new FormFields;
        if($request->hasFile('image')){
            $path = $request->file('image')->store('/public');
            $formField->imagelink = $path;
        }

         $formField->name = $request->name;
         $formField->description = $request->description;
         $formField->placeholder = $request->placeholder;
         $formField->class = $request->class;
         $formField->formfield_type_id = $request->input_type;
         $formField->is_input_text = $request->is_input_text;
         $formField->min = $request->min;
         $formField->max = $request->max;
         $formField->options = preg_split("/\\r\\n|\\r|\\n/", $request->options);
         $formField->videolink = $request->videolink;
         $formField->position = Arrangement::nextPosition($request->arrangement_id);
         $formField->arrangement_id = $request->arrangement_id;
        $formField->save();
        return back();
    }
}
