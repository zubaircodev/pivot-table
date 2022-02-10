<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class UserFollow extends Component
{
    /**
     * @var int
     */
    public $userCount;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->userCount = User::count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-follow');
    }
}
