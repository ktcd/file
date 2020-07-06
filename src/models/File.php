<?php

namespace Ktcd\File\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'id',
        'name',
        'path',
        'model_id',
        'model_type',
        'type',
        'mime_type',
        'size',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('ktcd_file.file_table'));
    }
}
