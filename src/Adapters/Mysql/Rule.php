<?php

namespace He426100\Casbin\Adapters\Mysql;

use Hyperf\DbConnection\Model\Model;

/**
 * Rule Model.
 */
class Rule extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['ptype', 'v0', 'v1', 'v2', 'v3', 'v4', 'v5'];

    /**
     * Indicates if the model should be timestamped.
     */
    public bool $timestamps = false;

    /**
     * Create a new Eloquent model instance.
     *
     * @param array  $attributes
     * @param string $guard
     */
    public function __construct(array $attributes = [], string $table = 'rule')
    {
        $this->setTable($table);
        parent::__construct($attributes);
    }
}
