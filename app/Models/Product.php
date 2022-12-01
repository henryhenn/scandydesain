<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                ->orWhere('luas_bangunan', 'like', '%' . $search . '%')
                ->orWhere('ukuran_tanah', 'like', '%' . $search . '%')
                ->orWhere('fee_desain', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            });
        });

        $query->when($filters['scenario'] ?? false, function ($query, $scenario) {
            return $query->whereHas('scenario', function ($query) use ($scenario) {
                $query->where('name', $scenario);
            });
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_categories_id', 'id');
    }

    public function scenario(): BelongsTo
    {
        return $this->belongsTo(ProductScenario::class, 'product_scenario_id', 'id');
    }

    public function foto(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function review(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class);
    }
}
