<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calendar extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'calendars';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['body'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
