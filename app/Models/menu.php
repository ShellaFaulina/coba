<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model{
    use HasFactory;

    public function menu(){
        $data = menu::all(); 
        return view('menu', compact('data'));
    }

}

?>