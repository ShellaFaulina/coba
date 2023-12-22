<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Models;

class service extends Model{
    use HasFactory;

    public function service(){
        $data = service::all(); 
        return view('service', compact('data'));
    }

}

?>