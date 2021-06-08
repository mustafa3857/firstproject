<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
                'title'=>'required|max:255',
                'body'=>'required',
                'image'=>'required'
            ];
        
    }


    public function messages(){
        return [
            'title.required'=>'Title text box field should not be empty:',
            'title.max'=>'Title must be in range of 255 charaters:',
            'body.required'=>'Body text area field should not be empty:',
            'image.required'=>'Choose any image:'
        ];
    }

}
