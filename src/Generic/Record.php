<?php

namespace CommonRoutes\Generic;

use stdClass;

/**
 * Class Record
 * This object is designed to be a single entry from a "database"/JSON Object/JSON String/Array/etc
 */
class Record extends stdClass
{
    /**
     * Record constructor.
     * @param bool|string|array|stdClass $json
     */
    public function __construct(mixed $json = false)
    {
        if ($json !== false) {
            if (is_string($json)) {
                $this->set(json_decode($json, true));
            }
            if (is_array($json) || $json instanceof stdClass) {
                $this->set($json);
            }
        }
    }

    /**
     * @param array|stdClass $data
     */
    public function set(mixed $data)
    {
        if (is_array($data) || is_iterable($data)) {
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    $sub = RecordFactory::create(recordType: self::class);
                    $sub->set($value);
                    $value = $sub;
                }
                $this->{$key} = $value;
            }
        } else {
            $this->{$data} = $data;
        }
    }

    public function count(): int
    {
        $count = 0;
        foreach ($this as $property) {
            $count++;
        }
        return $count;
    }

    public function asArray()
    {
        return json_decode(json_encode($this), true);
    }

}
