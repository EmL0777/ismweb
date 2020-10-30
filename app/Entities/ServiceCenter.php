<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ServiceCenter extends Model
{
    protected $table = 'service_centers';

    protected $primaryKey = 'id';

    // 可以大量指定異動的欄位 (Mass Assignment)
    protected $fillable = [
        'title',
        'address',
        'phone1',
        'phone2',
        'fax',
        'email',
        'attn',
        'continent',
        'country',
    ];
}
