<?php

namespace App;

use Spatie\Activitylog\Traits\LogsActivity;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, LogsActivity, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hotels()
    {
        return $this->hasMany(Models\Hotel::class);
    }

    public function configurations()
    {
        return $this->belongsToMany(Models\Configuration::class);
    }

    public function headquarters()
    {
        return $this->belongsToMany(Models\Hotel::class);
    }

    public function shifts()
    {
        return $this->hasMany(Models\Shift::class);
    }

    public function vouchers()
    {
        return $this->hasMany(Models\Voucher::class);
    }

    public function employees()
    {
        return $this->hasMany(User::class, 'parent');
    }

    public function boss()
    {
        return $this->belongsTo(User::class, 'parent');
    }

    #####################################

    public function guests()
    {
        return $this->hasMany(Models\Guest::class);
    }

    public function services()
    {
        return $this->hasMany(Models\Service::class);
    }

    public function rooms()
    {
        return $this->hasMany(Models\Room::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Models\Vehicle::class);
    }

    public function assets()
    {
        return $this->hasMany(Models\Asset::class);
    }

    public function products()
    {
        return $this->hasMany(Models\Product::class);
    }

    public function companies()
    {
        return $this->hasMany(Models\Company::class);
    }

    public function props()
    {
        return $this->hasMany(Models\Prop::class);
    }

    /**
     * Get the notes for the user.
     */
    public function notes()
    {
        return $this->hasMany(Models\Note::class);
    }

    /**
     * Get the tags for the user.
     */
    public function tags()
    {
        return $this->hasMany(\App\Models\Tag::class);
    }

	/**
     * Unhash an ID collection.
     *
     * @param  array	$ids
     * @return array
     */
    public function getAllPermissionsAttribute() {
        $permissions = [];

        $user = $this->where('id', auth()->user()->id)
            ->with([
                'permissions' => function ($query)
                {
                    $query->select(['id', 'name', 'guard_name']);
                }
            ])->first(['id']);

        $user->permissions->each(function ($permission) use (&$permissions)
        {
            $permissions[] = $permission->name;
        });

        return $permissions;
    }
}
