<?php

namespace App\QueryFilters;

use Closure;

class Sort extends Filter
{

    protected function applyFilter($builder)
    {
        return $builder->orderBy('name', request($this->filterName()));
    }
}
