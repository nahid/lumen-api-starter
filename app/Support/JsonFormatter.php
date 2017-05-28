<?php

namespace App\Support;

use Dingo\Api\Http\Response\Format\Json;

class JsonFormatter extends Json
{
    /**
     * Format an Eloquent model.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return string
     */
    public function formatEloquentModel($model)
    {
        return $this->encode(['data' => $model->toArray()]);
    }

    /**
     * Format an Eloquent collection.
     *
     * @param \Illuminate\Database\Eloquent\Collection $collection
     *
     * @return string
     */
    public function formatEloquentCollection($collection)
    {
        if ($collection->isEmpty()) {
            return $this->encode([]);
        }

        $model = $collection->first();

        return $this->encode(['data' => $collection->toArray()]);
    }

    /**
     * Format an array or instance implementing Arrayable.
     *
     * @param array|\Illuminate\Contracts\Support\Arrayable $content
     *
     * @return string
     */
    public function formatArray($content)
    {
        $content = $this->morphToArray($content);

        array_walk_recursive($content, function (&$value) {
            $value = $this->morphToArray($value);
        });

        return $this->encode($content);
    }
}
