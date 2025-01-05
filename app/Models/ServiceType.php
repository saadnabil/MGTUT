<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function services(){
        return $this->hasMany(Service::class);
    }
    public function getTypeTranslatedAttribute(){
        $lang = app()->getLocale();
        $type = json_decode($this->type , true);
        return $type[$lang];
    }
}
