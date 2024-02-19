<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothes extends Model
{
    use HasFactory;

    protected $table = "clothess";
    protected $guarded = ['id'];


    public function transactiondetail(){

    	return $this->hasMany(TransactionDetail::class);
    }
}
