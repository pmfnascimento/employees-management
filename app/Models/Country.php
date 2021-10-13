<?php

namespace App\Models;

use App\Models\State;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'country_code',
        'name',
    ];

    public function state()
    {
        return $this->hasMany(State::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

}
