<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class issues extends Model
{
    use HasFactory;

    /**
     * Tên bảng (nếu không đặt theo quy tắc mặc định).
     */
    protected $table = 'issues';

    /**
     * Các trường có thể gán giá trị hàng loạt.
     */
    protected $fillable = [
        'computer_id',
        'reported_by',
        'reported_date',
        'description',
        'urgency',
        'status',
    ];

    /**
     * Mối quan hệ: Một vấn đề thuộc về một máy tính.
     */
    public function computer()
    {
        return $this->belongsTo(computers::class, 'computer_id');
    }
}
