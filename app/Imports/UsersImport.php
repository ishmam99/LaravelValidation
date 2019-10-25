<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'CustomerName'  => $row[0],
            'Gender'   => $row[1],
            'Address'   => $row[2],
            'City'    => $row[3],
            'PostalCode'  => $row[4],
            'Country'   => $row[5]
        ]);
    }
}
