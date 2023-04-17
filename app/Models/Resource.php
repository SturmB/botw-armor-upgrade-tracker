<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resource extends Model
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
    protected $fillable = ["name", "image", "created_at", "updated_at"];

    /**
     * @return BelongsToMany
     */
    public function armors(): BelongsToMany
    {
        return $this->belongsToMany(Armor::class)
            ->using(Requirement::class)
            ->withPivot("id", "tier", "quantity_needed")
            ->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot("quantity_owned")
            ->withTimestamps();
    }

    /**
     * Get the requirements in which this resource are used.
     *
     * @return HasMany
     */
    public function requirements(): HasMany
    {
        return $this->hasMany(Requirement::class);
    }
}
