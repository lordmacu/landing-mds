<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['names','address','documentNumber','documentType','email','knowUs','phone'];

}
