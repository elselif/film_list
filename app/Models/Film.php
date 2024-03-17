<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id'];

    public function category()
    {
        return $this->belongsTo(FilmCategory::class);
    }
    public static function search($keyword)
    {
        return self::where('name', 'LIKE', "%$keyword%")
            ->get();
    }
}
