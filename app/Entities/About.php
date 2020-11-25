<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';

    protected $primaryKey = 'id';

//    可以大量指定異動的欄位 (Mass Assignment)
    protected $fillable = [
        'id',
        'intro',
        'event_year',
        'position',
    ];

    public function Abouts_i18ns()
    {
        return $this->hasMany(About_i18n::class);
    }

    public function saveQuietly()
    {
        return static::withoutEvents(function () {
            return $this->save();
        });
    }
}
