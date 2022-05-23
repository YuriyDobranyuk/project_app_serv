<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class MainPage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $user;
    public $isClient;
    public $isManager;
    public $userSendOrderToday;

    public function __construct()
    {
        $user = Auth::user();
        $isClient = $user->hasRole('client');
        $isManager = $user->hasRole('manager');
        $userSendOrderToday = false;

        $this->user = $user;
        $this->isClient = $isClient;
        $this->isManager = $isManager;
        $this->userSendOrderToday = $userSendOrderToday;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main-page');
    }
}
