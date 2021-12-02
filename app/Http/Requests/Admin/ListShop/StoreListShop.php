<?php namespace App\Http\Requests\Admin\ListShop;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreListShop extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.list-shop.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'name_shop' => ['required', 'string'],
                        'address' => ['required', Rule::unique('list_shop', 'address'), 'string'],
                        
        ];
    }
}
