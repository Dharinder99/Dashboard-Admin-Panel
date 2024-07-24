<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Country;
use App\Models\States;
use App\Models\Cities;

class Country extends Model
{
    use HasFactory;

    protected $table="countries";

//     public function getCountries()
// {
//     return DB::table('countries')
//         ->where('id', $this->countries_id)
//         ->first();
// }

}
