<?php

namespace App\Http\Controllers;
use App\Models\Record;
use Milon\Barcode\DNS2D;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class RecordController extends Controller
{
    public function show($id){
        
       $record =  Record::Find($id);
       return view('record', compact('record'));
    }
  
    // public function generateQrCode()
    // {
    //     // Generate the QR code
    //     $result = Builder::create()
    //         ->data('Your content')
    //         ->size(5999)
    //         ->margin(10)
    //         ->build();

    //     // Ensure the 'public/qr' directory exists
    //     $path = public_path('qr');
    //     if (!File::exists($path)) {
    //         File::makeDirectory($path, 0755, true);
    //     }

    //     // Save the QR code to a file
    //     $filename = $path . '/qr-code.png';
    //     $result->saveToFile($filename);

    //     return response()->json(['message' => 'QR code generated successfully!', 'file' => $filename]);
    // }
    public function generateQRCode()
    {
        // dd("here we are ");
        $qrCode = new DNS2D();
        $path = public_path('qr');
        if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }
        $uuid = Str::uuid()->toString();
        $uuid = substr($uuid,0,8);
        $url = route('record.show', 1 .'?uuid'.$uuid);
        $qrImage = $qrCode->getBarcodePNG($url, 'QRCODE');
        $filename = $path . '/qr-code.png';
        $qrImageFile = base64_decode($qrImage);
        file_put_contents($filename, $qrImageFile);
       
        // Return view with QR code
        return $path . " uuid " . $uuid; 
        return view('qrcode', compact('qrImage'));
    }

}
