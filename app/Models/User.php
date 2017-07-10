<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\CRUD\CrudTrait;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, CrudTrait, HasRoles;

    /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

    protected $table = 'users';
    protected $primaryKey = 'id';
    // protected $guarded = [];
     protected $hidden = ['password', 'remember_token'];
    protected $fillable = ['name', 'email', 'password'];
    public $timestamps = true;

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function questions(): HasMany
    {
        return $this->hasMany('App\Models\Question');
    }

    public function options(): HasMany
    {
        return $this->hasMany('App\Models\Option');
    }

    public function classes(): HasMany
    {
        return $this->hasMany('App\Models\QuestionClass');
    }

    public function weights(): HasMany
    {
        return $this->hasMany('App\Models\Weight');
    }

    public function categories(): HasMany
    {
        return $this->hasMany('App\Models\Category');
    }

    public function answers(): HasMany
    {
        return $this->hasMany('App\Models\Answer');
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Permission');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

}
