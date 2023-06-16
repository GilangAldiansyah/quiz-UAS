<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';


    protected $fillable = [
        'nama_produk',
        'stok',
        'harga',
    ];

    public static function getOutOfStockProducts(){
        return self::where('stok', 0)->get();
    }
    public static function getInStockProducts(){
        return self::where('stok', '>', 0)->get();
    }
    // public static function updateStock($productId, $newStock){
    // $product = self::findOrFail($productId);
    // $product->stock = $newStock;
    // $product->save();
    // }
}
