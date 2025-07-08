<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Translation",
 *     type="object",
 *     required={"key", "value", "locale"},
 *     @OA\Property(property="id", type="integer", description="ID of the translation"),
 *     @OA\Property(property="locale", type="string", description="Locale of the translation (e.g., en, fr, es)"),
 *     @OA\Property(property="key", type="string", description="Key for the translation"),
 *     @OA\Property(property="value", type="string", description="Value of the translation"),
 *     @OA\Property(property="tag", type="string", description="Tag for context (e.g., mobile, web)"),
 * )
 */
class Translation extends Model
{
    use HasFactory;

    protected $table = "translations";
    protected $guarded = [];
}
