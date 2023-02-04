<?php

namespace App\Exceptions;

use Exception;
use Google\Cloud\RecaptchaEnterprise\V1\TokenProperties\InvalidReason;

class InvalidTokenException extends Exception
{
    public function __construct(public ?int $reason = null)
    {
        parent::__construct(sprintf(
            'Invalid token, reason: %s',
            $this->reason ? InvalidReason::name($reason) : 'Unspecified reason'
        ));
    }

    public static function forReason(?int $reason = null): self
    {
        return new self(reason: $reason);
    }

    /**
     * @codeCoverageIgnore
     */
    public function context(): array
    {
        return [
            'reason' => $this->reason ? InvalidReason::name($this->reason) : null,
            'code' => $this->reason,
        ];
    }
}
