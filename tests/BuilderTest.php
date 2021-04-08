<?php

use LiamJCooper\Countries\Builder;
use PHPUnit\Framework\TestCase;

class BuilderTest extends TestCase
{
    public function testCountriesFileExists()
    {
        $this->assertFileExists('src/Static/Countries.php');
    }

    public function testReturnsArray()
    {
        $countries = new Builder;

        $this->assertIsArray($countries->all());
    }

    public function testCountriesContainKeysAndData()
    {
        $keys = ['name', 'iso_2', 'iso_3', 'code'];
        $countries = (new Builder)->all();

        foreach ($countries as $country) {
            foreach ($keys as $key) {
                $this->assertArrayHasKey($key, $country);
                $this->assertFalse(empty($country[$key]));
            }
        }
    }

    public function testCanQueryData()
    {
        $countries = new Builder;
        $results = $countries->where('iso_2', 'GB');

        $this->assertIsArray($results);
        $this->assertTrue($results[0]['name'] === 'United Kingdom');
    }
}
