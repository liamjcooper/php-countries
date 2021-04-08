<?php

namespace LiamJCooper\Countries;

class Builder
{
    /** @var array */
    private $data = [];

    public function __construct()
    {
        $this->data = include __DIR__ . '/Static/Countries.php';
    }

    /**
     * Return all of the countries as is, unfiltered and with all columns.
     *
     * @return array
     */
    public function all(): array
    {
        return $this->data;
    }

    /**
     * Query the dataset by key and value, e.g. $builder->where('iso_2', 'GB');
     * to return the United Kingdom row.
     *
     * @param string $key
     * @param string $value
     * @param bool $strict whether the value should be checked strictly
     */
    public function where(string $key, string $value, bool $strict = true): array
    {
        return array_values(
            array_filter($this->data, function ($country) use ($key, $value, $strict) {
                if (!array_key_exists($key, $country)) {
                    return false;
                }

                return $strict ? $country[$key] === $value : $country[$key] == $value;
            })
        );
    }
}
