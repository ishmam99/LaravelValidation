<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'CustomerName',
            'Gender',
            'Address',
            'City',
            'PostalCode',
            'Country'
    ];
}
