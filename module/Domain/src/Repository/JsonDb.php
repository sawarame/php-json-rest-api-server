<?php

/**
 * @see       https://github.com/sawarame/php-json-server for the canonical source repository
 * @copyright https://github.com/sawarame/php-json-server/blob/master/COPYRIGHT.md
 * @license   https://github.com/sawarame/php-json-server/blob/master/LICENSE.md New BSD License
 */

namespace Domain\Repository;

/**
 * @deprecated
 */
interface JsonDb
{
    /**
     * Load json data from schema name.
     *
     * @param string $schemaName
     * @return JsonDb
     */
    public function load(string $schemaName): JsonDb;

    /**
     * Check to has data or not.
     *
     * @return boolean
     */
    public function hasData(): bool;

    /**
     * Return current data converted to array.
     *
     * @return array
     */
    public function toArray(): array;

    /**
     * Insert data.
     *
     * @param array $data
     * @return integer
     */
    public function insert(array $data): int;

    /**
     * Find data by primary key.
     *
     * @param integer $id
     * @return array|null
     */
    public function find(int $id): ?array;

    /**
     * Get page from params.
     *
     * @param array $params
     * @return integer
     */
    public function page(array $params): int;

    /**
     * Get number of rows per page.
     *
     * @param array $params
     * @return integer
     */
    public function rows(array $params): int;

    /**
     * Retrurn data searched.
     *
     * @param array $params
     * @return array
     */
    public function read(array $params): array;

    /**
     * Count total data rows.
     *
     * @param array $params
     * @return integer
     */
    public function countTotal(array $params): int;

    /**
     * Update date.
     *
     * @param array $data
     * @return JsonDb
     */
    public function update(array $data): JsonDb;

    /**
     * Delete data.
     *
     * @param integer $id
     * @return JsonDb
     */
    public function delete(int $id): JsonDb;

    /**
     * Save current data.
     *
     * @return JsonDb
     */
    public function permanent(): JsonDb;
}
