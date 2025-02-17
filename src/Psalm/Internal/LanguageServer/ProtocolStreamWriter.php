<?php

declare(strict_types=1);

namespace Psalm\Internal\LanguageServer;

use Amp\ByteStream\WritableResourceStream;

/**
 * @internal
 */
class ProtocolStreamWriter implements ProtocolWriter
{
    private WritableResourceStream $output;

    /**
     * @param resource $output
     */
    public function __construct($output)
    {
        $this->output = new WritableResourceStream($output);
    }

    /**
     * {@inheritdoc}
     */
    public function write(Message $msg): void
    {
        $this->output->write((string)$msg);
    }
}
