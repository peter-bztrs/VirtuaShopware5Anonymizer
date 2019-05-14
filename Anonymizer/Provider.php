<?php

namespace VirtuaShopwareAnonymizer\Anonymizer;

use Faker\Factory;

class Provider
{
    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * @var string
     */
    private $salt;

    /**
     * Initializes Faker, generates new salt for RNG seeds
     *
     * @param string|null $locale
     * @return void
     */
    public function __construct($locale = null)
    {
        if ($locale === null) {
            $locale = Factory::DEFAULT_LOCALE;
        }
        $this->faker = Factory::create($locale);
        $this->salt = sha1(uniqid('', true));
    }

    /**
     * Resets the UniqueGenerator of Faker, this should be used after anonymizing a database table with
     * unique values to free memory and allow the same values in other tables
     *
     * @return void
     */
    public function resetUniqueGenerator()
    {
        $this->faker->unique(true);
    }

    /**
     * Return fake data from given Faker provider, always return the same data for each ($formatter, $identifier)
     * combination after initialized.
     *
     * @param string $formatter
     * @param mixed $identifier
     * @param bool $unique
     * @return mixed
     */
    public function getFakerData($formatter, $identifier, $unique = false)
    {
        $faker = $this->faker;
        if ($formatter === 'null') {
            return $faker->optional(0)->randomDigit;
        }
        if ($unique) {
            $faker = $faker->unique();
        }
        $this->seedRng($formatter . $identifier);
        $result = $faker->format($formatter);
        $this->resetRng();

        return $result;
    }

    /**
     * @param $identifier
     */
    private function seedRng($identifier)
    {
        $this->faker->seed(hexdec(hash("crc32b", $identifier . $this->salt)));
    }

    /**
     * Reset random number generator
     */
    private function resetRng()
    {
        mt_srand();
    }
}
