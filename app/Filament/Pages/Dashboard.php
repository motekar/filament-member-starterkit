<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Support\Facades\Blade;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationLabel = 'Dasbor';

    protected static ?string $title = 'Dasbor';

    protected static ?int $navigationSort = -2;

    protected static string $view = 'filament.pages.dashboard';

    public function getTitle(): string
    {
        return 'Dasbor';
    }

    public function getColumns(): int | string | array
    {
        return 3;
    }

    public function getWidgets(): array
    {
        return [
            //
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            //
        ];
    }

    public function getViewData(): array
    {
        return [
            'scripts' => Blade::render('
                <!-- load external scripts here -->
            '),
        ];
    }
}
