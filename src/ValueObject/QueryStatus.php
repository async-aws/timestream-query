<?php

namespace AsyncAws\TimestreamQuery\ValueObject;

/**
 * Information about the status of the query, including progress and bytes scanned.
 */
final class QueryStatus
{
    /**
     * The progress of the query, expressed as a percentage.
     */
    private $progressPercentage;

    /**
     * The amount of data scanned by the query in bytes. This is a cumulative sum and represents the total amount of bytes
     * scanned since the query was started.
     */
    private $cumulativeBytesScanned;

    /**
     * The amount of data scanned by the query in bytes that you will be charged for. This is a cumulative sum and
     * represents the total amount of data that you will be charged for since the query was started. The charge is applied
     * only once and is either applied when the query completes running or when the query is cancelled.
     */
    private $cumulativeBytesMetered;

    /**
     * @param array{
     *   ProgressPercentage?: null|float,
     *   CumulativeBytesScanned?: null|string,
     *   CumulativeBytesMetered?: null|string,
     * } $input
     */
    public function __construct(array $input)
    {
        $this->progressPercentage = $input['ProgressPercentage'] ?? null;
        $this->cumulativeBytesScanned = $input['CumulativeBytesScanned'] ?? null;
        $this->cumulativeBytesMetered = $input['CumulativeBytesMetered'] ?? null;
    }

    public static function create($input): self
    {
        return $input instanceof self ? $input : new self($input);
    }

    public function getCumulativeBytesMetered(): ?string
    {
        return $this->cumulativeBytesMetered;
    }

    public function getCumulativeBytesScanned(): ?string
    {
        return $this->cumulativeBytesScanned;
    }

    public function getProgressPercentage(): ?float
    {
        return $this->progressPercentage;
    }
}
