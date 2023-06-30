<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'street',
        'barangay',
        'city',
        'customer_id',
    ];

    /**
     * Get the user that owns the phone.
     */
    public function customers(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
