<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BorrowedBook extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'member_id',
        'book_id',
        'return_date',
        'status',
    ];

    public function book(){
        return $this->belongsTo(Book::class);
    }
    
    public function member(){
        return $this->belongsTo(Member::class);
    }
}
