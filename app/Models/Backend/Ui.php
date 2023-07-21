<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ui extends Model
{
    use HasFactory;
    protected $table = 'ui';
    protected $fiillable =[
            'company_name',
            'logo',
            'email',
            'address',
            'phone',
            'information',

    ];
}
