<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['ct_name', 'ct_desc', 'ct_status'];

    public function companies(): MorphToMany
    {
        return $this->morphToMany(Company::class, 'taggable');
    }
}