<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RoleUser extends Model {

    use CrudTrait;

    /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

    protected $table = 'role_users';
     protected $primaryKey = 'id';
    // protected $guarded = [];
    // protected $hidden = ['id'];
    protected $fillable = ['role_id', 'user_id'];
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

    public function users(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Role');
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