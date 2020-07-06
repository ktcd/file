<?php

namespace Ktcd\File\Traits;

use Ktcd\File\Models\File as FileModel;

trait HasFile
{
    public function files()
    {
        return $this->morphMany(FileModel::class, 'model', 'model_type', 'model_id')->select([
            'files.id',
            'files.name',
            'files.path',
            'files.model_id',
            'files.model_type',
            'files.type',
            'files.mime_type',
            'files.size',
            'files.created_by',
            'files.updated_by',
            'files.created_at',
            'files.updated_at'
        ]);
    }

    public function file()
    {
        return $this->morphTo(FileModel::class, 'model', 'model_type', 'model_id')->select([
            'files.id',
            'files.name',
            'files.path',
            'files.model_id',
            'files.model_type',
            'files.type',
            'files.mime_type',
            'files.size',
            'files.created_by',
            'files.updated_by',
            'files.created_at',
            'files.updated_at'
        ]);
    }
}
