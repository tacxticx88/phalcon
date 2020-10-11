<?php

/**
 * This file is part of the Phalcon.
 *
 * (c) Phalcon Team <team@phalcon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Validation;

use Phalcon\Validation;

/**
 * This is a base class for combined fields validators
 */
abstract class AbstractValidatorComposite extends AbstractValidator implements ValidatorCompositeInterface
{
    /**
     * @var array
     */
    protected $validators = [];

    /**
     * Executes the validation
     *
     * @param Validation $validation
     * @param $field
     * @return bool
     * @throws Exception
     */
    public function validate(Validation $validation, $field): bool
    {
        if (count($this->getValidators()) === 0) {
            throw new Exception(get_class($this) . " does not have any validator added");
        }

        foreach ($this->getValidators() as $validator) {
            if ($validator->validate($validation, $field) === false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Return all validators
     *
     * @return array
     */
    public function getValidators(): array
    {
        return $this->validators;
    }
}
