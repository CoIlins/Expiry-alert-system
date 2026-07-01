<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// #[Fillable(['first_name', 
//             'last_name', 
//             'email', 
//             'password', 
//             'role_id', 
//             'business_name'
//             ])]
// #[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $table = 'users';

    protected $primaryKey = 'user_id';

        protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id',
        'business_name',
        'vendor_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role(): BelongsTo{
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

        public function clerks(): HasMany
    {
        return $this->hasMany(User::class, 'vendor_id', 'user_id');
    }

    /**
     * A Clerk belongs to exactly one Vendor.
     */
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'vendor_id', 'user_id');
    }

    public function batches(): HasMany
    {
        return $this->hasMany(Batch::class, 'user_id', 'user_id');
    }

    // Clerk has modified many stocks
    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class, 'user_id', 'user_id');
    }

    public function hasRole($role)
    {
        return $this->role->role_name === $role;
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    //     public function getLastTokenUsage()
    // {
    //     return $this->tokens->where('last_used_at', '!=', null)->sortByDesc('last_used_at')->first();
    // }
}
