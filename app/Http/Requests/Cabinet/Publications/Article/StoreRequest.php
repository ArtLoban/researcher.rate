<?php

namespace App\Http\Requests\Cabinet\Publications\Article;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'authors' => 'required|string',
            'description' => 'nullable|string',
            'publication_type_id' => 'required|integer',
            'journal_name' => 'required|string',
            'journal_number' => 'required|integer',
            'year' => 'required|integer|digits:4',
            'pages' => 'required|string',
            'language' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
        ];
    }
}
