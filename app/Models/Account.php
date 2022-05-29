<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Account extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'username',
        'password',
        'require_password',
        'notes',
        'website',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->setId();

        });

    }

    public function setId()
    {
        $this->attributes['id'] = Str::uuid();
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
        : static::query()
        ->where('name', 'like', '%'.$search.'%')
        ->orWhere('email', 'like', '%'.$search.'%')
        ->orWhere('username', 'like', '%'.$search.'%');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
