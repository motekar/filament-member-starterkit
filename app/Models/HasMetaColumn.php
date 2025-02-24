<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

trait HasMetaColumn
{
    // boot trait
    public static function bootHasMetaColumn()
    {
        static::saving(function (Model $model) {
            if (! $model->isDirty('meta')) {
                return;
            }

            if (empty($model->meta)) {
                $model->meta = [];
            }

            $originalMeta = is_string($model->getOriginal('meta'))
                ? json_decode($model->getOriginal('meta'), true)
                : $model->getOriginal('meta') ?? [];

            if (is_string($model->meta)) {
                $model->meta = rescue(fn () => json_decode($model->meta, true), []);
            }

            // prevent data loss
            $model->meta = array_merge($originalMeta, $model->meta);
        });
    }

    public function initializeHasMetaColumn()
    {
        /** @var Model $this */
        $this->mergeFillable(['meta']);
        $this->mergeCasts(['meta' => 'array']);
    }

    public function emptyMeta()
    {
        static::withoutEvents(fn () => $this->update(['meta' => []]));
    }

    public function deleteMeta($key)
    {
        $meta = $this->meta ?? [];

        Arr::forget($meta, $key);

        static::withoutEvents(fn () => $this->update(['meta' => $meta]));
    }

    public function updateMeta($key, $value)
    {
        $meta = $this->meta ?? [];

        Arr::set($meta, $key, $value);

        static::withoutEvents(fn () => $this->update(['meta' => $meta]));
    }

    public function setMeta($key, $value)
    {
        $this->meta = array_merge($this->meta ?? [], [$key => $value]);
    }
}
