<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\DocumentStatusChanged;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'status',
        'description',
        'file',
        'options',
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'nik',
        'fakultas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $dispatchesEvents = [
        'updated' => DocumentStatusChanged::class,
    ];

    public static function boot()
    {
        parent::boot();

        static::updated(function ($document) {
            if ($document->isDirty('status') && $document->status == 'selesai') {
                event(new DocumentStatusChanged($document));
            }
        });
    }
}
