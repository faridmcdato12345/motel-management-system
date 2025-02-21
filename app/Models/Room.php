<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate_id',
        'room_number',
        'room_type_id',
        'is_occupied',
        'user_id'
    ];

    protected $with = ['users','types'];

    public function rates(): BelongsTo
    {
        return $this->belongsTo(Rate::class, 'rate_id','id','rates');
    }

    public function types(): BelongsTo
    {
        return $this->belongsTo(RoomType::class, 'room_type_id','id','room_types');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id','users');
    }
}
