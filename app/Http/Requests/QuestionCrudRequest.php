<?php
/**
 * Created by PhpStorm.
 * User: alexanderstevens
 * Date: 5/29/17
 * Time: 3:56 PM
 */

namespace app\Http\Requests;

use App\Http\Requests\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class QuestionCrudRequest extends CrudController {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:255'
        ];
    }

}