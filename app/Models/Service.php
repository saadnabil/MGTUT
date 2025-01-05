<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function getTitleTranslatedAttribute(){
        $lang = app()->getLocale();
        $title = json_decode($this->title , true);
        return $title[$lang];
    }
    protected $date = ['deleted_at'];

    public function users(){
        return $this->belongsToMany(User::class, 'user_services');
    }
}
