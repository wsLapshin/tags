<?php

namespace Tjventurini\Tags\App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class TagRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = config('tags.rules', [
            'name' => 'required|min:2|max:50',
            'slug' => 'unique:tags,slug',
            'image' => 'required|string',
            'description' => 'required|min:50|max:255',
        ]);

        // make exception if this is an update
        if (request('id', false)) {
            $rules['slug'] = [
                Rule::unique('tags','slug')
                    ->ignore(\Tjventurini\Tags\App\Models\Tag::find(request('id', false))->slug, 'slug'),
            ];
        }

        return $rules;
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
