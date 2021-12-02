<?php namespace App\Http\Requests\Admin\ListShop;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateListShop extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.list-shop.edit', $this->listShop);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'name_shop' => ['sometimes', 'string'],
                        'address' => ['sometimes', Rule::unique('list_shop', 'address')->ignore($this->listShop->getKey(), $this->listShop->getKeyName()), 'string'],
                                ];
    }


    /**
    * Modify input data
    *
    * @return  array
    */
    public function getSanitized()
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }

}
