<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $date= ['deleted_at'];
    public function service(){
        return $this->belongsTo(Service::class)->withTrashed();
    }
    public function getTitleTranslatedAttribute(){
        $lang = app()->getLocale();
        $title = json_decode($this->title , true);
        return $title[$lang];
    }
    public function getDescriptionTranslatedAttribute(){
        $lang = app()->getLocale();
        $description = json_decode($this->description , true);
        return $description[$lang];
    }
    public function getTagTranslatedAttribute(){
        $lang = app()->getLocale();
        $tag = json_decode($this->tag , true);
        return $tag[$lang];
    }
    public function getResortTranslatedAttribute(){
        $lang = app()->getLocale();
        $resort = json_decode($this->resort , true);
        return $resort[$lang];
    }
    public function getLocationTranslatedAttribute(){
        $lang = app()->getLocale();
        $tag = json_decode($this->location , true);
        return $tag[$lang];
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function saves(){
        return $this->morphMany(Save::class , 'saveable');
    }
}
