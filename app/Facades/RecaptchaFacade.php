<?php

namespace App\Facades;

use App\Contracts\RecaptchaContract;
use App\Services\RecaptchaService;
use Closure;
use Illuminate\Support\Facades\Facade;

/**
 * @method static static setThreshold(float $threshold)
 * @method static static setScore(float $score)
 * @method static static setProperties(\Google\Cloud\RecaptchaEnterprise\V1\TokenProperties $properties)
 * @method static static forceValid(bool $value = true)
 *
 * @see RecaptchaService
 */
class RecaptchaFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return RecaptchaService::class;
    }

    /**
     * @throws \App\Exceptions\InvalidTokenException
     * @throws \App\Exceptions\MissingPropertiesException
     * @throws \Google\ApiCore\ApiException
     */
    public static function assess(string $token): RecaptchaContract
    {
        return app(RecaptchaService::class)->assess($token);
    }
}
