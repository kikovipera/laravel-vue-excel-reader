<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    protected $fillable = ['address', 'city', 'sales'];

    protected $hidden = ['created_at','updated_at'];

}
