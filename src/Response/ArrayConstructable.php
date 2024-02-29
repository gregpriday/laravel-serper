<?php

namespace GregPriday\LaravelSerper\Response;

use Exception;
use ReflectionClass;

trait ArrayConstructable
{
    /**
     * Create a class instance from an array.
     */
    public static function fromArray(array $data): static
    {
        $reflection = new ReflectionClass(static::class);
        $constructor = $reflection->getConstructor();
        $params = $constructor->getParameters();
        $args = [];
        foreach ($params as $param) {
            $name = $param->getName();
            $args[$name] = $data[$name] ?? null;
        }

        return new static(...$args);
    }

    /**
     * Create an array from a class instance.
     */
    public function toArray(): array
    {
        $reflection = new ReflectionClass(static::class);
        $properties = $reflection->getProperties();
        $data = [];
        foreach ($properties as $property) {
            $name = $property->getName();
            if ($property->isPublic() && ! empty($this->$name)) {
                $data[$name] = $this->$name;
            }
        }

        return $data;
    }

    /**
     * Create an array of class instances from an array of arrays.
     *
     * @param  ?array  $dataArray  Array of arrays to process.
     * @param  string  $className  Name of the class to create instances of.
     * @return array Array of class instances.
     *
     * @throws Exception
     */
    public static function buildInstancesFromArray(?array $dataArray, string $className): array
    {
        if (empty($dataArray)) {
            return [];
        }

        // Make sure that $className is using this trait
        if (! in_array(ArrayConstructable::class, class_uses($className))) {
            throw new Exception("{$className} must use the ArrayConstructable trait.");
        }

        return array_map(function (array $data) use ($className) {
            return $className::fromArray($data);
        }, $dataArray);
    }
}
