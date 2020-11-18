<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class About_i18n extends Model
{
    protected $table = 'abouts_i18n';

    protected $primaryKey = 'id';

//    可以大量指定異動的欄位 (Mass Assignment)
    protected $fillable = [
        'id',
        'about_id',
        'languages',
        'title',
        'content',
    ];

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
