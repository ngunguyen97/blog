<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Customer extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'status' => 1
    ];

    public function getActiveAttribute($attribute) {
        return $this->activeOptions()[$attribute];
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeInactive($query) {
        return $query->where('status', 0);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function activeOptions() {
        return [
            '0' => 'Inactive',
            '1' => 'Active'
        ];
    }

    public static function allPosts() {
        return app(Pipeline::class)
            ->send(Customer::query())
            ->through([
                \App\QueryFilters\Active::class,
                \App\QueryFilters\Sort::class,
            ])
            ->thenReturn()
            ->paginate(10);
    }
}
