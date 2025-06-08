<?php

namespace App\Rules;

use App\Exceptions\InvalidTokenException;
use App\Facades\RecaptchaEnterpriseFacade;
use Carbon\CarbonInterval;
use Google\Cloud\RecaptchaEnterprise\V1\TokenProperties\InvalidReason;
use Illuminate\Contracts\Validation\Rule;

class RecaptchaEnterpriseRule implements Rule
{
    protected ?int $reason = null;

    /**
     * Constructor.
     */
    public function __construct(public ?string $action = null, public ?CarbonInterval $interval = null)
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     */
    public function passes($attribute, $value): bool
    {
        try {
            $recaptcha = RecaptchaEnterpriseFacade::assess($value);
        } catch (InvalidTokenException $exception) {
            $this->reason = $exception->reason;

            return false;
        }

        $validAction = true;
        $validInterval = true;

        if ($this->action) {
            $validAction = $recaptcha->validateAction($this->action);
        }

        if ($this->interval) {
            $validInterval = $recaptcha->validateCreationTime($this->interval);
        }

        return $recaptcha->validateScore() && $validAction && $validInterval;
    }

    public function action(?string $action = null): static
    {
        $this->action = $action;

        return $this;
    }

    public function validity(?CarbonInterval $interval = null): static
    {
        $this->interval = $interval;

        return $this;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validation.recaptcha', [
            'reason' => $this->reason ? InvalidReason::name($this->reason) : 'Unknown reason',
        ]);
    }
}
