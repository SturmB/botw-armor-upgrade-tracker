<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\Requirement
 *
 * @property int $id
 * @property int $armor_id
 * @property int $resource_id
 * @property int $tier
 * @property int $quantity_needed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Armor $armor
 * @property-read \App\Models\Resource $resource
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereArmorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereQuantityNeeded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereResourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereTier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Requirement extends Pivot
{
    use HasFactory;

    /**
     * The table name for requirements.
     *
     * @var string
     */
    protected $table = 'armor_resource';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Gets the armor that is associated with this requirement.
     *
     * @return BelongsTo
     */
    public function armor(): BelongsTo
    {
        return $this->belongsTo(Armor::class);
    }

    /**
     * Gets the resource that is associated with this requirement.
     *
     * @return BelongsTo
     */
    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class);
    }
}
