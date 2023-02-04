<?php

namespace App\Contracts;

use Carbon\CarbonInterval;

interface RecaptchaContract
{
    /**
     * Assess the token against Google reCAPTCHA Enterprise
     *
     * @throws \App\Exceptions\InvalidTokenException
     * @throws \App\Exceptions\MissingPropertiesException
     * @throws \Google\ApiCore\ApiException
     */
    public function assess(string $token): static;

    public function validateScore(): bool;

    public function validateAction(string $action): bool;

    public function validateCreationTime(CarbonInterval $interval): bool;

    public function isValid(?string $action = null, ?CarbonInterval $interval = null): bool;
}
