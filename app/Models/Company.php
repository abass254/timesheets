<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['cp_name', 'cp_address', 'cp_country', 'cp_status'];

    public function countries(): MorphToMany
    {
        return $this->morphToMany(Country::class, 'taggable');
    }
}