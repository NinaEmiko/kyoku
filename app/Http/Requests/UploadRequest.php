<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
        $rules = [
            'name' => 'required'
        ];
        $tracks = count($this->input('tracks'));
        foreach(range(0, $tracks) as $index) {
        //    $rules['photos.' . $index] = 'audio|mimes:wav,mpga|max:96000';
        }

        $messages = array(
            'upload_count' => 'The :attribute field cannot be more than 2.',
        );

        $validator = Validator::make(
            Input::all(),
            array('file' => array('upload_count:file,2')), // first param is field name and second is max count
            $messages
        );

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


    <form action="/upload" method="post" enctype="multipart/form-data">
    ...

        //https://stackoverflow.com/questions/29087560/limit-number-of-files-that-can-be-uploaded/29093913#29093913

        return $rules;
    }
}
