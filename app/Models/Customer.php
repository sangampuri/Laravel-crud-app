<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $table='customers';
    protected $primaryKey = 'id';

    //!Transforms the name into uppercase before storing into database using "Mutator"
    public function setNameAttribute($value)
    {
        $this->attributes['name']= ucwords($value);
    }

    //*if the field name is like "first_name"
    //!instead of " setNameAttribute($value)"
    //! we have to use ""setUserNameAttribute()"

    ###################################################################################################

    public function getDobAttribute($value)
    {
        return date("d-M-Y",strtotime($value));
    }


}
