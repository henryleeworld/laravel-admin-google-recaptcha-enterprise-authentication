<?php

namespace App\Facades;

use App\Contracts\RecaptchaEnterpriseContract;
use App\Http\Integrations\RecaptchaEnterprise\RecaptchaEnterpriseConnector;
use Closure;
use Illuminate\Support\Facades\Facade;

/**
 * @method static static setThreshold(float $threshold)
 * @method static static setScore(float $score)
 * @method static static setProperties(\Google\Cloud\RecaptchaEnterprise\V1\TokenProperties $properties)
 * @method static static forceValid(bool $value = true)
 *
 * @see RecaptchaEnterpriseConnector
 */
class RecaptchaEnterpriseFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return RecaptchaEnterpriseConnector::class;
    }

    /**
     * @throws \App\Exceptions\InvalidTokenException
     * @throws \App\Exceptions\MissingPropertiesException
     * @throws \Google\ApiCore\ApiException
     */
    public static function assess(string $token): RecaptchaEnterpriseContract
    {
        return app(RecaptchaEnterpriseConnector::class)->assess($token);
    }
}
