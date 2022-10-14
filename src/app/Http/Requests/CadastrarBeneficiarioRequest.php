<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CadastrarBeneficiarioRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'beneficiarios' => ['required', 'array'],
            'beneficiarios.*.nome' => ['required', 'string', 'max:250'],
            'beneficiarios.*.idade' => ['required', 'integer', 'min:1', 'max:150'],
            'beneficiarios.*.plano' => ['required', Rule::in(range(1, 6))],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'beneficiarios.*.nome.required' => 'O preenchimento do nome é obrigatório.',
            'beneficiarios.*.idade.required' => 'O preenchimento da idade é obrigatório.',
            'beneficiarios.*.plano.required' => 'O preenchimento do plano é obrigatório.',
            'beneficiarios.*.plano.invalid' => 'O plano escolhido é inválido ou não existe.',

        ];
    }
}
