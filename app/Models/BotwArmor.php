<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BotwArmor extends Model
{
    use HasFactory;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = "integer";

    /**
     * @var array
     */
    protected $fillable = [
        "botw_armor_set_id",
        "name",
        "image",
        "upgradable",
        "created_at",
        "updated_at",
    ];

    /**
     * @return BelongsToMany
     */
    public function resources(): BelongsToMany
    {
        return $this->belongsToMany(BotwResource::class, "botw_armor_resource")
            ->using(BotwRequirement::class)
            ->withPivot("id", "tier", "quantity_needed")
            ->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->using(BotwTrack::class)
            ->withPivot("tracking", "tracking_tier_start", "tracking_tier_end")
            ->withTimestamps();
    }

    /**
     * @return BelongsTo
     */
    public function armorSet(): BelongsTo
    {
        return $this->belongsTo(BotwArmorSet::class, "botw_armor_set_id");
    }

    /**
     * Get the requirements in which this armor is used.
     *
     * @return HasMany
     */
    public function requirements(): HasMany
    {
        return $this->hasMany(BotwRequirement::class, "botw_armor_id");
    }
}
