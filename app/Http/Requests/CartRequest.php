<?php
/**
 * Created by PhpStorm.
 * User: Ricardo_2
 * Date: 13/03/2016
 * Time: 11:28
 */

namespace CodeCommerce\Http\Requests;

class CartRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'qtd' => 'required|min:1',
        ];
    }
}
