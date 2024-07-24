<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $table="states";
    use HasFactory;

//     public function getStates()
// {
//     return DB::table('states')
//         ->where('id', $this->states_id)
//         ->first();
// }

}
