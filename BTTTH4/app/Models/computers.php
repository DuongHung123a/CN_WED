<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class computers extends Model
{
    use HasFactory;

    /**
     * Tên bảng (nếu không đặt theo quy tắc mặc định).
     */
    protected $table = 'computers';

    /**
     * Các trường có thể gán giá trị hàng loạt.
     */
    protected $fillable = [
        'computer_name',
        'model',
        'operating_system',
        'processor',
        'memory',
        'available',
    ];

    /**
     * Mối quan hệ: Một máy tính có thể có nhiều vấn đề (issues).
     */
    public function issues()
    {
        return $this->hasMany(Issues::class, 'computer_id');
    }
}
