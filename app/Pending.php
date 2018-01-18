<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pending extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pendings';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['owner', 'affair', 'status', 'people_id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function people()
    {
        return $this->belongsTo('App\Person');
    }

    public function tracings()
    {
        return $this->hasMany('App\Tracing');
    }
}
