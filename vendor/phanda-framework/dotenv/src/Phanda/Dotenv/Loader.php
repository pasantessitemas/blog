<?php

namespace Phanda\Dotenv;

use Dotenv\Loader as BaseLoader;

class Loader extends BaseLoader
{

    protected $envMapping = [];

    /**
     * Set an environment variable.
     *
     * This is done using:
     * - putenv,
     * - $_ENV,
     * - $_SERVER.
     *
     * The environment variable value is stripped of single and double quotes.
     *
     * @param string      $name
     * @param string|null $value
     *
     * @return void
     */
    public function setEnvironmentVariable($name, $value = null)
    {
        list($name, $value) = $this->normaliseEnvironmentVariable($name, $value);

        $this->variableNames[] = $name;

        // Don't overwrite existing environment variables if we're immutable
        // Ruby's dotenv does this with `ENV[key] ||= value`.
        if ($this->immutable && $this->getEnvironmentVariable($name) !== null) {
            $this->envMapping[$name] = $this->getEnvironmentVariable($name);
            return;
        }

        // If PHP is running as an Apache module and an existing
        // Apache environment variable exists, overwrite it
        if (function_exists('apache_getenv') && function_exists('apache_setenv') && apache_getenv($name)) {
            apache_setenv($name, $value);
        }

        if (function_exists('putenv')) {
            putenv("$name=$value");
        }

        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
        $this->envMapping[$name] = $value;
    }

    /**
     * Returns an array of the environment.
     *
     * Where the key is the environment name,
     * and the value is the environment value.
     *
     * @return array
     */
    public function getEnvMapping()
    {
        return $this->envMapping;
    }

}