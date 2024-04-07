<?php

namespace App\Livewire\Components\Menus\Tenant;

use Livewire\Component;

class MainNavigationMenu extends Component
{
    protected $listeners = [
        'refresh-navigation-menu' => '$refresh',
    ];
    public function render()
    {
        return view('livewire.components.menus.tenant.main-navigation-menu');
    }
}
