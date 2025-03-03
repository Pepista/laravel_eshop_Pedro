<?php
 
namespace App\Models;
 
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
 
class User extends Authenticatable implements FilamentUser
{
    // ...
 
    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
    }
}