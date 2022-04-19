<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/CqvujW2C1CBlqg0wxkL0caF0HKM1E2ZRvyyXV8Lf.png';
        return '/storage/' . $imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

   // private mixed $user_id;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
