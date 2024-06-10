<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $fillable = [
       'honesty',
       'municipal',
       'id_number',
       'name',
       'sex',
       'nationality',
       'health_certificate_number',
       'occupation',
       'issue_date_hc_H',
       'issue_date_hc_AD',
       'end_date_hc_H',
       'end_date_hc_AD',
       'type_of_edu',
       'end_date_edu',
       'licence_number',
       'facility_name',
       'facility_no',
       'image_path',
    ];
}
