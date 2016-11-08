<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';

    public function idEncripted($value){
    	return (($value*20)-3);  
    }

    public function idDecripted($value){
    	return (($value-3)/5);   
    }

}
