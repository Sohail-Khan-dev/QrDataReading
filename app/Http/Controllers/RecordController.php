<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function show($id){
       $record =  Record::Find($id);
       return view('record', compact('record'));
    }

}
