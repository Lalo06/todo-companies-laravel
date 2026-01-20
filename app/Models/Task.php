<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'company_id',
        'is_completed',
        'start_at',
        'expired_at',
        'project_id',
    ];

    protected $casts = [
        'is_completed' => 'boolean',
        'start_at' => 'datetime',
        'expired_at' => 'datetime'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected static function booted()
    {
        static::creating(function ($task) {
            $task->start_at = now();
            $task->expired_at = now()->addDays(7);
        });
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
