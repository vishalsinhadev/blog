<?php 
/** 
 * @author	 : Vishal Kumar Sinha <vishalsinhadev@gmail.com> 
 */
namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required',
          //  'password' => ['required', 'string', 'min:8', 'confirmed'],
            //
        ];
    }
}
