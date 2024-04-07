<?php

namespace App\Livewire\Components\Menus\Central;

use Livewire\Component;

class MainNavigationMenu extends Component
{
    protected $listeners = [
        'refresh-navigation-menu' => '$refresh',
    ];
    public function render()
    {
        return view('livewire.components.menus.central.main-navigation-menu');
    }
}
