<?php

namespace App\Livewire;

use App\Models\Record;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class UserRecords extends Component
{
    use WithFileUploads;
    // Properties 
    public $isOpen = false;
    public $recordId = null;
    public $searchById = '';
    public $searchByCertificate = '';

    public $honesty , $municipal,$id_number, $nationality, $sex,$occupation, $health_certificate_number; 
    public $issue_date_hc_H,$issue_date_hc_AD, $end_date_hc_H ,$end_date_hc_AD  ;
    public $name,$end_date_edu , $type_of_edu, $facility_name, $licence_number,$facility_no; 
    public $image;
    public $qrPath;
    protected $rules = [
        'honesty' => 'required|string|max:255',
        'municipal' => 'required|string|max:255',
        'id_number' => 'required|numeric',
        'name' => 'required|string|max:255',
        'sex' => 'required|string|max:255',
        'nationality' => 'required|string|max:255',
        'health_certificate_number' => 'required|numeric',
        'occupation' => 'required|string|max:255',
        'issue_date_hc_H' => 'required|date',
        'issue_date_hc_AD' => 'required|date',
        'end_date_hc_H' => 'required|date',
        'end_date_hc_AD' => 'required|date',
        'type_of_edu' => 'required|string|max:255',
        'end_date_edu' => 'required|date',
        'licence_number' => 'required|string|max:255',
        'facility_name' => 'required|string|max:255',
        'facility_no' => 'required|numeric',
        'image' => 'required|image|max:2048', // Validate the image file
    ];
    // Methods 
    public function openModal()
    {
        // dd('modal is called');
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function save() {
        // if($this->recordId){
        //     $this->update($this->recordId);
        //     return;
        // }
        // dump('save is called'. $this->honesty, $this->name);
        $validateData = $this->validate();
        
        try{
            $imagePath = '';
            if ($this->image) {
                $filename = $this->name.$this->id_number . '.' . $this->image->getClientOriginalExtension();
                $imagePath = $this->image->storeAs('images', $filename, 'public');
            }
            $validateData['image_path'] = $imagePath;
            
            $record = Record::create($validateData);
            $this->recordId = $record->id;
            $this->generateQrCode();
            $this->reset();
        }
        catch (\Throwable $e){
            dd( 'Error adding Recordd. Please try again!' . $e);
            return;
        }
    }
    public function generateQrCode()
    {
        $uuid = Str::uuid()->toString();
        $url = route('qr.store', $this->recordId.'?uuid'.$uuid);
        // $qrCode = (new DNS2D)->getBarcodePNG($url, 'QRCODE',10,10);  //DATAMATRIX
        $qrCode = QrCode::size(200)->style('square')->margin(2)->backgroundcolor(255, 254, 255)->color(0,0,0)
        ->encoding('ISO-8859-1')->errorCorrection('M')
        ->format('svg')
        ->generate($url);
    
        $path = 'qrcodes/' . $this->recordId . '.svg';
        Storage::disk('public')->put($path, $qrCode);
        $imgurl = $this->qrPath = Storage::url($path);
        // return  $imgurl;
        
    }
    // public function testGeneration(){
    //     $url = route('record.show', $this->recordId.'?uuid');
    //     $logoPath = public_path('qr/qr.png');
    //     $qrCode = QrCode::format('png')
    //     ->size(200) // Adjust size
    //     // ->merge($logoPath, 0.3, true) // Adjust the size and position of the embedded content
    //     ->errorCorrection('H') // High error correction to ensure the embedded content is readable
    //     ->generate($url);
    //     $fileName = 'qrcodes/' . $this->recordId . '.png';
    //     Storage::disk('public')->put($fileName, base64_decode($qrCode));
    //     $this->qrPath = Storage::url($fileName);
    // }

    public function showRecord($id){
        $record = Record::FindOrFail($id);
        if($record)
            return redirect()->route('record.show', $id);
        else{
            return response()->json([
                'error' => "Record Not Found "
            ]);
        }
    }

    public function searchRecord(){
        if($this->searchById){
            $record = Record::where('id_number',$this->searchById)->first();
            $this->searchById = '';
        }
        else{
            $record = Record::where('health_certificate_number',$this->searchByCertificate)->first();
        }
        return $record;
    }
    public function render()
    {
        // $recoreds = Record::all();
        return view('livewire.user-records',[
            'recoreds' => Record::all()
        ]);
    }
}
