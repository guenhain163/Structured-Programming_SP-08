<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInformation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model
     *
     * @var string
    */
    protected $table = 'customer_informations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'city', 'district', 'town', 'address', 'phone_number'];
}
