<?php

namespace Inside\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use inside\Services\UsuarioLogadoService;

class AcessoRequest extends FormRequest
{
    private $userService;
    public function __construct(UsuarioLogadoService $user)
    {
        $this->userService = $user;

    }
    public function authorize()
    {

        $user = $this->userService->getUsuarioLogadoData($this);
        return $user->isNotExecutivo();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
