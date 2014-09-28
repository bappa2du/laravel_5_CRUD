<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|alpha|min:6',
            'topic'=> 'required|min:6'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /*
     * if authorize return false forbiddenResponse works
     */
    public function forbiddenResponse()
    {
        return redirect("")
            ->with('message', '');
    }


}
