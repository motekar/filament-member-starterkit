<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Login as AuthLogin;

class Login extends AuthLogin
{
    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('email')
                ->label('Email / Telpon')
                ->required()
                ->autofocus()
                ->extraInputAttributes(['tabindex' => 1]),
            $this->getPasswordFormComponent(),
            $this->getRememberFormComponent(),
        ]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        // if data['email'] is a phone number, we should convert it to a email
        if (preg_match('/^[0-9]+$/', $data['email'])) {
            $user = User::where('phone', $data['email'])->first();
            if ($user) {
                $data['email'] = $user->email;
            }
        }

        return [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
    }
}
