<?php

namespace App\Filament\Pages;

use App\Enums\UserRole;
use App\Models\Settings;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $title = 'Pengaturan';

    protected static ?string $navigationLabel = 'Pengaturan';

    protected static ?int $navigationSort = 100;

    protected static string $view = 'filament.pages.settings';

    public ?array $data = [];

    public static function canAccess(): bool
    {
        return auth()->user()?->role === UserRole::ADMIN;
    }

    public function mount(): void
    {
        $settings = Settings::where('key', 'allowed_phone_numbers')->first();
        $this->form->fill([
            'allowed_phone_numbers' => $settings?->value ?? [],
        ]);
    }

    public function form(Form $form): Form
    {
        return $form->statePath('data')
            ->schema([
                Section::make('Pengaturan Keamanan')
                    ->schema([
                        Textarea::make('allowed_phone_numbers')
                            ->label('Nomor Telepon yang Diizinkan')
                            ->rows(5)
                            ->helperText('Nomor telepon yang diizinkan untuk mendaftar, pisahkan dengan baris baru')
                            ->required(),
                    ]),
            ])
            ->inlineLabel();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Settings::updateOrCreate(
            ['key' => 'allowed_phone_numbers'],
            ['value' => $data['allowed_phone_numbers']],
        );

        Notification::make()
            ->title('Settings saved successfully')
            ->success()
            ->send();
    }
}
