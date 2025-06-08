<?php

namespace App\Facades;

use App\Contracts\RecaptchaEnterpriseContract;
use App\Http\Integrations\RecaptchaEnterprise\RecaptchaEnterpriseConnector;
use Closure;
use Illuminate\Support\Facades\Facade;

/**
 * Recaptcha enterprise facade
 */
class RecaptchaEnterpriseFacade extends Facade
{
    /**
     * Get the registered name of the component.
     */
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
