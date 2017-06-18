<?php

namespace app\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\OptionCrudRequest as StoreRequest;
use App\Http\Requests\OptionCrudRequest as UpdateRequest;

class OptionCrudController extends CrudController {

    public function setup() {
        $this->crud->setModel("App\Models\Option");
        $this->crud->setRoute("admin/option");
        $this->crud->setEntityNameStrings('option', 'options');

        $this->crud->setColumns(['question number', 'option', 'risk type', 'weight', 'order']);
        $this->crud->addField([
            'name' => 'question_number',
            'label' => "Question number",
            'type' => 'number',
        ]);
        $this->crud->addField([
            'name' => 'option',
            'label' => 'Option',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'risk_type_id',
            'label' => 'Risk type',
            'type' => 'select',
            'entity' => 'risk_type',
            'attribute' => '?',
            'model' => "App\Models\Question",
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