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

    /**
     * Accessor
     * automatically show human readable text when we pull this field
     * instead of the database entry which is just an INT otherwise
     * @example $customer->active
     * @param $attribute
     * @return string
     */
    public function getActiveAttribute($attribute ): string
    {
        return $this->activeOptions()[$attribute];
    }

    /**
     * Mutator
     * will capitalize the attribute values
     * @param $attribute
     */
    public function setNameAttribute($attribute)
    {
        $this->attributes['name'] = ucfirst($attribute);
    }

    /**
     * Custom method to be used in accessor and also in the form to dynamically generate options from one place
     * Sets the options for "active" field, k is the db value, and v is the human readable label.
     * We only need to add a new option here, and it will be updated in the view (form)
     * We migrated it outside the accessor, so we can use it to control all the available values
     * This can be made even more dynamic if we store tha values in the database to add/remove with a form
     * @return string[]
     */
    public function activeOptions(): array
    {
        return [
            1 => 'Active',
            0 => 'Inactive',
            2 => 'Trial',
        ];
    }
}
