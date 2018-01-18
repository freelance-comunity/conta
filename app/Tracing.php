<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

class Tracing extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tracings';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['body', 'people', 'type', 'pending_id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function pending()
    {
        return $this->belongsTo('App\Pending');
    }

}
