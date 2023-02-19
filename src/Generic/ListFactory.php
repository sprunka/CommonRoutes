<?php

namespace CommonRoutes\Generic;

use InvalidArgumentException;
use stdClass;

class ListFactory
{
    /**
     * Creates a new RecordList or a child class of RecordList with the given data.
     *
     * @param bool|array|string|stdClass $data The data to create the RecordList from.
     * @param bool $autoSave Whether the created RecordList should automatically save changes.
     * @param bool $createFile Whether to create a new file if the given file does not exist.
     * @param string $listType The name of the class to create. Must be a child of RecordList.
     * @return RecordList The created RecordList object.
     * @throws InvalidArgumentException If $listType is not a child of RecordList or does not exist.
     */
    public static function create(
        bool|array|string|stdClass $data = false,
        bool $autoSave = false,
        bool $createFile = false,
        string $listType = RecordList::class
    ): RecordList {

        if (!class_exists($listType)) {
            throw new InvalidArgumentException("$listType does not exist.");
        }

        $return = new $listType($data, $autoSave, $createFile);

        if (!is_a($return, RecordList::class)) {
            throw new InvalidArgumentException("{$listType} must be a '" . RecordList::class . "' or a child thereof.");
        }

        return $return;
    }
}
