<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $storeData)
 * @method static findOrFail(string $id)
 * @method static whereId(string $id)
 * @method static find(string $id)
 * @method static paginate(int $int)
 * @method static where()
 */
class BookManagement extends Model
{
    use HasFactory;
    protected $fillable = ['isbn', 'publisher', 'numPage', 'genre', 'author', 'img', 'price'];
}
