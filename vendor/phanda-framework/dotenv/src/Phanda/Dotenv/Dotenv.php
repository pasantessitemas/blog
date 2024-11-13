<?php

namespace Phanda\Dotenv;

use Dotenv\Dotenv as BaseDotenv;

class Dotenv extends BaseDotenv
{

    /**
     * Dotenv constructor
     *
     * @param $path
     * @param string $file
     */
    public function __construct($path, $file = '.env')
    {
        parent::__construct($path, $file);

        $this->loader = new Loader($this->filePath, true);
    }

    /**
     * Returns an array of the environment.
     *
     * Where the key is the environment name,
     * and the value is the environment value.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->loader->getEnvMapping();
    }

}