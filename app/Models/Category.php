<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Note
 *
 * @mixin Builder
 */
class Category extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'title',
        'description'
    ];
}
