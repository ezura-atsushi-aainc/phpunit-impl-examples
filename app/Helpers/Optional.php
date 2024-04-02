<?php

namespace App\Helpers;

final class Optional
{
    /** @var mixed */
    private $objectNullEnabled;

    private function __construct(mixed $objectNullEnabled)
    {
        $this->objectNullEnabled = $objectNullEnabled;
    }

    public static function ofNullable(mixed $objectNullEnabled): Optional
    {
        return new Optional($objectNullEnabled);
    }

    public function isPresent(callable $callbackFunction = null): mixed
    {
        $enabled = !is_null($this->objectNullEnabled);

        if (is_null($objectNullEnabled)) {
            return $enabled;
        }

        if ($enabled) {
            $callbackFunction($this->objectNullEnabled);
        }
    }
}
