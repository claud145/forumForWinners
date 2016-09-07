<?php

namespace conference\Http\Requests;

use conference\Http\Requests\Request;

class TransactionCreateRequest extends Request
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
         'transaction_nit' => 'required',
         'transaction_name' => 'required',
        //  'transaction_phone' => 'required',
        // 'transaction_response' => 'required',
        'sector_price' => 'required',
        'sector_quantity' => 'required|numeric|max:5',
        'payment_type' => 'required',
        'transaction_user' => 'required',
        'transaction_sector' => 'required',
        'transaction_assistants' => 'required',
        'transaction_total' => 'required',
       ];
     }
}
