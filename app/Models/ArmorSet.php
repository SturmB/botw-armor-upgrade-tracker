<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\ArmorSet
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 * @property Armor[] $armors
 * @property-read int|null $armors_count
 * @method static \Illuminate\Database\Eloquent\Builder|ArmorSet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArmorSet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArmorSet query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArmorSet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArmorSet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArmorSet whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArmorSet whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArmorSet whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\ArmorSetFactory factory(...$parameters)
 */
class ArmorSet extends Model
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
     * @return HasMany
     */
    public function armors(): HasMany
    {
        return $this->hasMany(Armor::class);
    }
}
