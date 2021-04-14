<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'email', 'active'];  //  specify which fields are accepted from forms
    protected $guarded = [];    //  specify which fields are always rejected. empty means, we accept all as long as a column exists for them

    public function scopeActive($query) {
        return $query->where('active', 1);
    }
    public function scopeInactive($query) {
        return $query->where('active', 0);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
