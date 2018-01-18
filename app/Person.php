<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'people';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'last_name', 'phone', 'email'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function pendings()
    {
        return $this->hasMany('App\Pending');
    }
}
