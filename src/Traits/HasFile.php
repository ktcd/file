<?php

namespace Ktcd\File\Traits;

use Ramsey\Uuid\Uuid;
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
        return $this->morphOne(FileModel::class, 'model');
    }

    public function addFile($requestFile, $type = null, $target = null, $data = [])
    {
        $this->files()->where('type', $type)->delete();
        $this->store($requestFile, $type, $target, $data);
    }

    private function store($requestFile, $type = null, $target = null, $data = [])
    {
        if (!$target) {
            $target = 'files';
        }
        $target = 'files/' . $target;

        $name = $requestFile->getClientOriginalName();
        $extension = $requestFile->getClientOriginalExtension();
        $size = $requestFile->getSize();
        $mimeType = $requestFile->getMimeType();
        $filename = join('_', [$type, Uuid::uuid4()->toString()]);
        $path = $target . '/' . $filename . '.' . $extension;

        $requestFile->move($target, $filename . '.' . $extension);

        $this->file()->create(array_merge([
            'name' => $name,
            'path' => $path,
            'type' => $type,
            'mime_type' => $mimeType,
            'size' => $size
        ], $data));
    }
}
