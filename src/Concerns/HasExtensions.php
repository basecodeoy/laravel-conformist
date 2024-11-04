<?php

declare(strict_types=1);

namespace BaseCodeOy\Conformist\Concerns;

use BaseCodeOy\Conformist\Contracts\Extension;

trait HasExtensions
{
    /**
     * @var Extension[]
     */
    private array $extensions = [];

    /**
     * @var Extension[]
     */
    private array $uninitializedExtensions = [];

    private bool $extensionsInitialized = false;

    /**
     * @return Extension[]
     */
    public function getExtensions(): array
    {
        return $this->extensions;
    }

    public function hasExtension(string $className): bool
    {
        foreach ($this->extensions as $extension) {
            if ($extension::class === $className) {
                return true;
            }
        }

        return false;
    }

    public function addExtension(Extension $extension): void
    {
        $this->uninitializedExtensions[] = $extension;
    }

    /**
     * @return Extension[]
     */
    public function extensions(): array
    {
        return [];
    }

    protected function initializeExtensions(): void
    {
        if ($this->extensionsInitialized) {
            return;
        }

        foreach ($this->extensions() as $extension) {
            $this->addExtension($extension);
        }

        while (\count($this->uninitializedExtensions) > 0) {
            foreach ($this->uninitializedExtensions as $i => $extension) {
                $extension->register($this);

                unset($this->uninitializedExtensions[$i]);
            }
        }

        $this->extensionsInitialized = true;
    }
}
