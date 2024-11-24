<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Conformist\Concerns;

use BaseCodeOy\Conformist\Contracts\Extension;

trait HasExtensions
{
    /** @var array<Extension> */
    private array $extensions = [];

    /** @var array<Extension> */
    private array $uninitializedExtensions = [];

    private bool $extensionsInitialized = false;

    /**
     * @return array<Extension>
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
     * @return array<Extension>
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
