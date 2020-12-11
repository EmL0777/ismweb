<?php

namespace App\Entities;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';

    protected $primaryKey = 'id';

//    可以大量指定異動的欄位 (Mass Assignment)
    protected $fillable = [
        'id',
        'intro',
        'event_year_month',
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

    public function getEventYearMonthAttribute($value): string
    {
        return $this->event_year_month = Str::substr($value, 0, 7);
    }
}
