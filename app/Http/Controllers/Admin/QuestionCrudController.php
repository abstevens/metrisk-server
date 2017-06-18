<?php

namespace app\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\QuestionCrudRequest as StoreRequest;
use App\Http\Requests\QuestionCrudRequest as UpdateRequest;

class QuestionCrudController extends CrudController {

    public function setup() {
        $this->crud->setModel("App\Models\Question");
        $this->crud->setRoute("admin/question");
        $this->crud->setEntityNameStrings('question', 'questions');

        $this->crud->setColumns(['order', 'name', 'description']);
        $this->crud->addField([
            'name' => 'name',
            'label' => "Question",
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'description',
            'label' => 'Description of question',
            'type' => 'textarea',
        ]);

        $this->crud->enableReorder('question', 1);
        $this->crud->allowAccess('reorder');
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }

}