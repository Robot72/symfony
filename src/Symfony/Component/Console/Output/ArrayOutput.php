<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Output;

/**
 * @author Robert Kuznetsov <robot3@xaker.ru>
 */
class ArrayOutput extends Output
{
    /**
     * @var string
     */
    private $array = [];
    private $itemArray = [];

    /**
     * Empties array and returns its content.
     *
     * @return string
     */
    public function fetch()
    {
        $content = $this->array;
        $this->array = [];

        return $content;
    }

    /**
     * {@inheritdoc}
     */
    protected function doWrite($message, $newline)
    {
        $this->itemArray[] = $message;

        if ($newline) {
            $this->array[] = $this->itemArray;
            $this->itemArray = [];
        }
    }
}
