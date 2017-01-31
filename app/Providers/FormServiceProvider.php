<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		Form::component('bsText', 'components.form.text', ['name', 'value', 'label' => null, 'attributes' => [], 'help']);
		Form::component('bsPassword', 'components.form.password', ['name', 'label' => null, 'attributes' => [], 'help']);
		Form::component('bsTextarea', 'components.form.textarea', ['name', 'value', 'label' => null, 'attributes' => []]);
		Form::component('bsNumber', 'components.form.number', ['name', 'value', 'label' => null, 'attributes' => []]);
		Form::component('bsCheckbox', 'components.form.checkbox', ['name', 'value', 'label', 'checked']);
		Form::component('bsCheckboxInline', 'components.form.checkbox_inline', ['name', 'value', 'label', 'checked']);
		Form::component('bsRadioInline', 'components.form.radio_inline', ['name', 'value', 'label', 'checked']);
		Form::component('submitCancelButtons', 'components.form.submit_cancel_buttons', ['submit_label', 'cancel_target']);
		Form::component('submitCancelDeleteButtons', 'components.form.submit_cancel_delete_buttons', ['submit_label', 'cancel_target', 'delete_target']);
		Form::component('bsSelect', 'components.form.select', ['name', 'items' => [], 'value' => null, 'attributes' => []]);
		Form::component('bsMultiSelect', 'components.form.multi_select', ['name', 'items' => [], 'value' => null, 'attributes' => []]);
		Form::component('deleteCancelButtons', 'components.form.delete_cancel_buttons', ['cancel_target']);
		Form::component('bsMultiCheckbox', 'components.form.multi_checkbox', ['name', 'elements', 'label' => null]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
