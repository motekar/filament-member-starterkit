<?php

namespace App\Filament\Widgets;

use App\Enums\UserRole;
use Filament\Widgets\Widget;

class MobileNavigation extends Widget
{
    protected static string $view = 'filament.widgets.mobile-navigation';

    public array $navigation = [];

    public function __construct()
    {
        $this->navigation = $this->getNavigationItems();
    }

    protected function getNavigationItems(): array
    {
        if (auth()->user()?->role !== UserRole::ADMIN) {
            return [
                [
                    'label' => 'Beranda',
                    'icon' => 'heroicon-o-home',
                    'url' => route('filament.app.pages.dashboard'),
                    'active' => request()->routeIs('filament.app.pages.dashboard'),
                ],
                [
                    'label' => 'Profil',
                    'icon' => 'heroicon-o-user',
                    'url' => '#',
                    'active' => request()->routeIs('filament.app.auth.profile'),
                ],
            ];
        }

        if (auth()->user()?->role === UserRole::ADMIN) {
            return [
                [
                    'label' => 'Beranda',
                    'icon' => 'heroicon-o-home',
                    'url' => '#',
                    'active' => request()->routeIs('filament.app.pages.dashboard'),
                ],
                [
                    'label' => 'Pengguna',
                    'icon' => 'heroicon-o-users',
                    'url' => '#',
                    'active' => request()->routeIs('filament.app.resources.users.*'),
                ],
                [
                    'label' => 'Pengaturan',
                    'icon' => 'heroicon-o-cog-6-tooth',
                    'url' => route('filament.app.pages.manage-settings'),
                    'active' => request()->routeIs('filament.app.pages.manage-settings'),
                ],
            ];
        }

        return [];
    }
}
