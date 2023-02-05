<?php

namespace MyintOo\LaravelStorageWrapper\Interfaces;

interface StorageServiceInterface
{
    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function put(string $in, \Illuminate\Http\File|\Illuminate\Http\UploadedFile|string $contents, mixed $options = []): bool;

    /** alias of @put method */
    public function upload(string $in, \Illuminate\Http\File|\Illuminate\Http\UploadedFile|string $contents, mixed $options = []): bool;
    
    /** alias of @put method */
    public function uploadFile(string $in, \Illuminate\Http\File|\Illuminate\Http\UploadedFile|string $contents, mixed $options = []): bool;

    public function deleteOldAndUploadNew(string $from, \Illuminate\Http\File|\Illuminate\Http\UploadedFile|string $contents, string $in = null, mixed $options = []): bool;

    /*
    |--------------------------------------------------------------------------
    | READ
    |--------------------------------------------------------------------------
    */
    public function allDirectories(string|null $from = null): array;

    /** alias of @allDirectories */
    public function allFolders(string|null $from = null): array;

    public function allFiles(string|null $from = null): array;

    public function files($in = null, $recursive = false): array;

    public function url(string $of): string;

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function delete(string|array $from): bool;

    public function deleteDirectory(string $from): bool;

    /** alias of @delete method */
    public function deleteFile(string|array $from): bool;

    /** alias of @deleteDirectory method */
    public function deleteFolder(string $from): bool;
}