<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'image',
        'bio',
        'private_account',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class, 'likes');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withPivot('confirmed');
    }

    public function follower()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id')->withPivot('confirmed');
    }

    public function sugessted_users()
    {
        // return User::all()->except([Auth::id()])->shuffle()->take(5);
        $folloingIds = $this->following()->pluck('users.id')->push(auth()->id());

        return User::whereNotIn('id', $folloingIds)->get()->shuffle()->take(5);
    }

    public function dataVisible(): bool
    {
        $isGuest = auth()->user() === null;
        if ($isGuest) {
            return ! $this->private_account;
        } else {
            return auth()->id() === $this->id || ! auth()->user()->private_account || auth()->user()->following()->get()->contains($this->id);
        }
    }

    public function canFollowed(): bool
    {
        $isGuest = auth()->user() === null;
        if ($isGuest) {
            return true;
        } else {

            return auth()->id() !== $this->id && ! auth()->user()->following()->get()->contains($this->id);
        }
    }

    public function follow(User $user)
    {

        if ($this === $user) {
            return;
        } elseif ($user->private_account) {

            return $this->following()->attach($user->id, ['confirmed' => 0]);
        } else {
            return $this->following()->attach($user->id, ['confirmed' => 1]);
        }

    }

    public function unFollow(User $user)
    {
        if ($this === $user) {
            return;
        } else {
            $this->following()->detach($user->id);
        }
    }

    public function isFollowing(User $user)
    {
      
        return $this->following()->where('users.id', $user->id)->wherePivot('confirmed', 1)->exists();
    }

    public function isPending(User $user)
    {
        return $this->following()->where('users.id', $user->id)->wherePivot('confirmed', 0)->exists();
    }

    public function pendingRequest(){
      
        return $this->follower()->wherePivot('confirmed',false)->get();
    }
     public function pendingCount(){
        
        return $this->follower()->wherePivot('confirmed',false)->count();
    }

    public function confirmFollower($requestedUserId){
        return $this->follower()->updateExistingPivot($requestedUserId,['confirmed'=> true]);

    }

   
}
