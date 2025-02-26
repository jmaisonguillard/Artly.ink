<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class Settings extends Component
{
    use WithFileUploads;

    // Profile Information
    public $avatar;
    public $display_name;
    public $email;
    public $bio;

    // Artist Settings
    public $username;
    public $professional_title;
    public $specialization;
    public $commission_status;
    public $turnaround_time;
    public $max_active_commissions;
    public $default_response_time;
    public $skills;
    public $instagram_username;
    public $twitter_username;
    public $portfolio_url;
    public $artstation_username;

    // Notification Settings
    public $email_notifications = false;
    public $commission_notifications = false;

    // Security
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function mount()
    {
        $user = Auth::user();

        // Load Profile Information
        $this->display_name = $user->display_name;
        $this->email = $user->email;
        $this->bio = $user->bio;

        // Load Artist Settings if user is an artist
        if ($user->is_artist && $user->artistProfile) {
            $this->username = $user->username;
            $this->professional_title = $user->artistProfile->professional_title;
            $this->specialization = $user->artistProfile->specialization;
            $this->commission_status = $user->artistProfile->commission_status;
            $this->turnaround_time = $user->artistProfile->turnaround_time;
            $this->max_active_commissions = $user->artistProfile->max_active_commissions;
            $this->default_response_time = $user->artistProfile->default_response_time;
            $this->skills = implode(',', $user->artistProfile->skills);
            $this->instagram_username = $user->artistProfile->instagram_username;
            $this->twitter_username = $user->artistProfile->twitter_username;
            $this->portfolio_url = $user->artistProfile->portfolio_url;
            $this->artstation_username = $user->artistProfile->artstation_username;
        }

        // Load Notification Settings
        $this->email_notifications = $user->email_notifications ?? false;
        $this->commission_notifications = $user->commission_notifications ?? false;
    }

    public function updateProfile()
    {
        $validated = $this->validate([
            'display_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::id())],
            'bio' => ['nullable', 'string', 'max:1000'],
        ]);

        Auth::user()->update($validated);

        $this->dispatch('profile-updated');
    }

    public function updateAvatar()
    {
        $this->validate([
            'avatar' => ['required', 'image', 'max:1024'], // 1MB max
        ]);

        $path = $this->avatar->store('avatars', 'public');

        Auth::user()->update([
            'avatar' => $path,
        ]);

        $this->dispatch('avatar-updated');
    }

    public function updateArtistSettings()
    {
        $this->validate([
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore(Auth::id())],
            'professional_title' => ['required', 'string', 'max:255'],
            'specialization' => ['required', 'string', 'max:255'],
            'commission_status' => ['required', 'string'],
            'turnaround_time' => ['required', 'string'],
            'max_active_commissions' => ['required', 'integer', 'min:0'],
            'default_response_time' => ['required', 'string'],
            'skills' => ['nullable', 'string'],
            'instagram_username' => ['nullable', 'string', 'max:255'],
            'twitter_username' => ['nullable', 'string', 'max:255'],
            'portfolio_url' => ['nullable', 'url', 'max:255'],
            'artstation_username' => ['nullable', 'string', 'max:255'],
        ]);


        $user = User::find(Auth::id());

        // Update username in users table
        $user->update([
            'username' => $this->username,
        ]);

        // Update or create artist profile
        $user->artistProfile()->updateOrCreate(
            [],
            [
                'professional_title' => $this->professional_title,
                'specialization' => $this->specialization,
                'commission_status' => $this->commission_status,
                'turnaround_time' => $this->turnaround_time,
                'max_active_commissions' => $this->max_active_commissions,
                'default_response_time' => $this->default_response_time,
                'skills' => explode(',', $this->skills),
                'instagram_username' => $this->instagram_username,
                'twitter_username' => $this->twitter_username,
                'portfolio_url' => $this->portfolio_url,
                'artstation_username' => $this->artstation_username,
            ]
        );

        $this->dispatch('artist-settings-updated');
    }

    public function updateNotificationSettings()
    {
        $user = User::find(Auth::id());
        $user->email_notifications = $this->email_notifications;
        $user->commission_notifications = $this->commission_notifications;
        $user->save();

        $this->dispatch('notification-settings-updated');
    }


    public function updatePassword()
    {
        $validated = $this->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        if (!Hash::check($validated['current_password'], Auth::user()->password)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'current_password' => ['The provided password does not match your current password.']
            ]);
        }

        Auth::user()->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        $this->dispatch('password-updated');
    }

    public function deleteAccount()
    {
        Auth::user()->delete();

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.settings');
    }

    // Helper methods for toggle switches
    public function toggleEmailNotifications()
    {
        $this->email_notifications = !$this->email_notifications;
        $this->updateNotificationSettings();
    }

    public function toggleCommissionNotifications()
    {
        $this->commission_notifications = !$this->commission_notifications;
        $this->updateNotificationSettings();
    }
}
