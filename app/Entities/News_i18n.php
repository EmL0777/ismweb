<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class News_i18n extends Model
{
    protected $table = 'news_i18n';

    protected $primaryKey = 'id';

//    可以大量指定異動的欄位 (Mass Assignment)
    protected $fillable = [
        'id',
        'news_id',
        'languages',
        'title',
        'content',
    ];

    public function News()
    {
        return $this->belongsTo('App\Entities\news');
    }
}
