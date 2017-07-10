<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Class extends Model {

    use CrudTrait;

    /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

    protected $table = 'options';
     protected $primaryKey = 'id';
    // protected $guarded = [];
    // protected $hidden = ['id'];
    protected $fillable = ['title', 'question_id', 'order', 'author_id'];
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

    public function users(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function questions()
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }

    public function weights()
    {
        return $this->hasMany('App\Models\Weight');
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