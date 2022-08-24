<?php

namespace GitScrum\Models;

use Illuminate\Database\Eloquent\Model;

class UserStat extends Model
{
    use GlobalPresenter;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_stats';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'code_lines'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];
}
