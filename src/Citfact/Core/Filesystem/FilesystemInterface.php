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

interface FilesystemInterface
{
    /**
     * Check if a file exists.
     *
     * @param  string  $path
     * @return bool
     */
    public function exists($path);

    /**
     * Write the contents of a file.
     *
     * @param  string  $path
     * @param  string  $contents
     * @param  bool  $lock
     * @return int
     */
    public function put($path, $contents, $lock = false);

    /**
     * Prepend to a file.
     *
     * @param  string  $path
     * @param  string  $data
     * @return int
     */
    public function prepend($path, $data);

    /**
     * Extract the file name from a file path.
     *
     * @param  string  $path
     * @return string
     */
    public function name($path);

    /**
     * Extract the file extension from a file path.
     *
     * @param  string  $path
     * @return string
     */
    public function extension($path);

    /**
     * Get the file type of a given file.
     *
     * @param  string  $path
     * @return string
     */
    public function type($path);

    /**
     * Get the file size of a given file.
     *
     * @param  string  $path
     * @return int
     */
    public function size($path);

    /**
     * Get the file's last modification time.
     *
     * @param  string  $path
     * @return int
     */
    public function lastModified($path);

    /**
     * Determine if the given path is a directory.
     *
     * @param  string  $directory
     * @return bool
     */
    public function isDirectory($directory);

    /**
     * Determine if the given path is writable.
     *
     * @param  string  $path
     * @return bool
     */
    public function isWritable($path);

    /**
     * Get the contents of a file.
     *
     * @param  string  $path
     * @return string
     * @throws FileNotFoundException
     */
    public function get($path);

    /**
     * Check path is a file.
     *
     * @param  string  $file
     * @return bool
     */
    public function isFile($file);
}
