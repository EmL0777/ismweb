<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $primaryKey = 'id';

//    可以大量指定異動的欄位 (Mass Assignment)
    protected $fillable = [
        'id',
        'name',
        'display',
        'pinned',
    ];

    public function News_i18ns()
    {
        return $this->hasMany(News_i18n::class);
    }
}
