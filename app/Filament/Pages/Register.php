<?php

namespace App\Filament\Pages;

use App\Models\Settings;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as AuthRegister;
use Filament\Pages\Page;

class Register extends AuthRegister
{
    public function form(Form $form): Form
    {
        return $form->schema([
            $this->getNameFormComponent(),
            TextInput::make('phone')
                ->required()
                ->in($this->getAllowedPhoneNumbers())
                ->unique('users', 'phone'),
            $this->getEmailFormComponent(),
            $this->getPasswordFormComponent(),
            $this->getPasswordConfirmationFormComponent(),
        ]);
    }

    protected function getAllowedPhoneNumbers(): array
    {
        return Settings::getAllowedPhoneNumbers();
    }
}
