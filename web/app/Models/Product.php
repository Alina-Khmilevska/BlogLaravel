<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Вказуємо ім'я таблиці, якщо воно не відповідає множині імені моделі
    protected $table = 'products';

    public $timestamps = false;

    // Вказуємо поля, які можуть бути масово призначені
    protected $fillable = [
        'name',
        'price',
        'rating',
        'num_reviews',
        'image_url',
        'sale',
        'link'
    ];

    // Вказуємо типи для кастомізації стовпців
    protected $casts = [
        'sale' => 'boolean',
        'price' => 'decimal:2',
        'rating' => 'decimal:1'
    ];

    // Вказуємо поля, які повинні бути перетворені на дати
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
