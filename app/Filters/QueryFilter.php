<?php

namespace App\Filters;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;

abstract readonly class QueryFilter
{
    protected abstract function getFilterKey(): string;

    protected abstract function apply(Builder $builder): Builder;

    public function __construct(protected Request $request)
    {
    }

    public function handle(Builder $builder, \Closure $next): Builder
    {
        $builder = $next($builder);

        if (!$this->request->filled($this->getFilterKey())) {
            return $builder;
        }

        return $this->apply($builder);
    }
}
