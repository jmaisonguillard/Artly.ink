<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;

class Profile extends Component
{
    public $user;
    public $gallery = [];
    public $commissions = [];
    public $socialLinks = [];

    public function mount($user)
    {
        $this->user = User::where('username', $user)->firstOrFail();
        // $this->gallery = $this->user->gallery()->latest()->get();
        // $this->commissions = $this->user->commissions()->active()->get();
        // $this->socialLinks = $this->user->socialLinks;
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
