<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return ['username' => 'required', 'password' => 'required'];
    }
    public function getCredentials()
    {
        $username = $this->get('username');
        if ($this->isEmail($username)) {
            return ['email' => $username, 'password' => $this->get('password')];
        }
        return $this->only('username', 'password');
    }
    private function isEmail($param)
    {
        $factory = $this->container->make(ValidationFactory::class);
        return !$factory->make(['username' => $param], ['username' => 'email'])->fails();
    }
}