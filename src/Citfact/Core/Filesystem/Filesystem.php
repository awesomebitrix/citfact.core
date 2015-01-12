<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Citfact\Core\Filesystem;

use Symfony\Component\Filesystem\Filesystem as BaseFilesystem;
use Symfony\Component\Finder\Finder;

class Filesystem extends BaseFilesystem implements FilesystemInterface
{
    /**
     * {@inheritdoc}
     */
    public function exists($path)
    {
        return file_exists($path);
    }

    /**
     * {@inheritdoc}
     */
    public function put($path, $contents, $lock = false)
    {
        return file_put_contents($path, $contents, $lock ? LOCK_EX : 0);
    }

    /**
     * {@inheritdoc}
     */
    public function prepend($path, $data)
    {
        if ($this->exists($path)) {
            return $this->put($path, $data.$this->get($path));
        }

        return $this->put($path, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getFilesDirectory($directory)
    {
        $finder = new Finder();

        return iterator_to_array($finder->files()->in($directory));
    }

    /**
     * {@inheritdoc}
     */
    public function name($path)
    {
        return pathinfo($path, PATHINFO_FILENAME);
    }

    /**
     * {@inheritdoc}
     */
    public function extension($path)
    {
        return pathinfo($path, PATHINFO_EXTENSION);
    }

    /**
     * {@inheritdoc}
     */
    public function type($path)
    {
        return filetype($path);
    }

    /**
     * {@inheritdoc}
     */
    public function size($path)
    {
        return filesize($path);
    }

    /**
     * {@inheritdoc}
     */
    public function lastModified($path)
    {
        return filemtime($path);
    }

    /**
     * {@inheritdoc}
     */
    public function isDirectory($directory)
    {
        return is_dir($directory);
    }

    /**
     * {@inheritdoc}
     */
    public function isWritable($path)
    {
        return is_writable($path);
    }

    /**
     * {@inheritdoc}
     */
    public function get($path)
    {
        if ($this->isFile($path)) {
            return file_get_contents($path);
        }

        throw new FileNotFoundException(sprintf('File does not exist: %s', $path));
    }

    /**
     * {@inheritdoc}
     */
    public function isFile($file)
    {
        return is_file($file);
    }
}