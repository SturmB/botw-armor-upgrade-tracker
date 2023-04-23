<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Track extends Pivot
{
    /**
     * The table name for requirements.
     *
     * @var string
     */
    protected $table = "armor_user";

    protected $fillable = [
        "user_id",
        "armor_id",
        "tracking",
        "tracking_tier_start",
        "tracking_tier_end",
    ];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Gets the Armor to be tracked.
     */
    public function armor(): BelongsTo
    {
        return $this->belongsTo(Armor::class);
    }

    /**
     * Gets the User doing the tracking.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
