<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded =[];
    
    public function profileImage()
    {
        $profileImage = ($this->image) ? "/storage/".$this->image : "/svg/No_image_available.svg";
        return $profileImage;
    }
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
