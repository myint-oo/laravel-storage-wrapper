<?php

namespace MyintOo\LaravelStorageWrapper\Drivers;

use MyintOo\LaravelStorageWrapper\Interfaces\StorageDriverInterface;

class DigitalOceanSpaceStorageDriver implements StorageDriverInterface
{
    private string $driver;

    public function __construct()
    {
        $this->driver = config('laravel-storage-wrapper.driver');
    }

    /**
     * put $contents in $path default visibility will be public
     */
    public function put(string $in, \Illuminate\Http\File|\Illuminate\Http\UploadedFile|string $contents, mixed $options = []): bool
    {
        // to have control over filename when other types of file is pass e.g. $request->file()
        // laravel adds a filename using $file->hashName() so just to prevent that feature
        if (! is_string($contents)) $contents = file_get_contents($contents);

        $options['visibility'] = isset($options['visibility']) ? $options['visibility'] : 'public';

        return \Storage::disk($this->driver)->put($in, $contents, $options);
    }

    /** alias of @put */
    public function upload(string $in, \Illuminate\Http\File|\Illuminate\Http\UploadedFile|string $contents, mixed $options = []): bool
    {
        return $this->put($in, $contents, $options);
    }

    /** alias of @put */
    public function uploadFile(string $in, \Illuminate\Http\File|\Illuminate\Http\UploadedFile|string $contents, mixed $options = []): bool
    {
        return $this->put($in, $contents, $options);
    }

    public function deleteOldAndUploadNew(string $from, \Illuminate\Http\File|\Illuminate\Http\UploadedFile|string $contents, string $in = null, mixed $options = []): bool
    {
        $this->deleteFile($from);

        if (is_null($in)) {
            // path/to/folder/to-delete-file -> path/to/folder
            $in = $from;
        }

        return $this->upload($in, $contents, $options);
    }

    public function allDirectories(string|null $from = null): array
    {
        return \Storage::disk($this->driver)->allDirectories($from);
    }

    /** alias of @allDirectories method */
    public function allFolders(string|null $from = null): array
    {
        return $this->allDirectories($from);
    }

    public function allFiles(string|null $from = null): array
    {
        return \Storage::disk($this->driver)->allFiles($from);
    }

    public function files($from = null, $recursive = false): array
    {
        return \Storage::disk($this->driver)->files($from, $recursive);
    }

    public function url(string $of): string
    {
        return \Storage::disk($this->driver)->url($of);
    }

    public function delete(string|array $from): bool
    {
        return \Storage::disk($this->driver)->delete($from);
    }

    /** alias of @delete method */
    public function deleteFile(string|array $from): bool
    {
        return $this->delete($from);
    }

    public function deleteDirectory(string $from): bool
    {
        return \Storage::disk($this->driver)->delete($from);
    }

    /** alias of @deleteDirectory method */
    public function deleteFolder(string $from): bool
    {
        return $this->deleteDirectory($from);
    }
}
