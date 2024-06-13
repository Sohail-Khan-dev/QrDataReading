<?php

namespace App\Http\Controllers;
use App\Models\Record;
use Endroid\QrCode\Builder\Builder;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
class RecordController extends Controller
{
    public function show($id){
       $record =  Record::Find($id);
       return view('record', compact('record'));
    }
  
    public function generateQrCode()
    {
        // Generate the QR code
        $result = Builder::create()
            ->data('Your content')
            ->size(5999)
            ->margin(10)
            ->build();

        // Ensure the 'public/qr' directory exists
        $path = public_path('qr');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        // Save the QR code to a file
        $filename = $path . '/qr-code.png';
        $result->saveToFile($filename);

        return response()->json(['message' => 'QR code generated successfully!', 'file' => $filename]);
    }

}
