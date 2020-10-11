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
interface ValidatorCompositeInterface
{
    /**
     * Executes the validation
     */
    public function getValidators(): array;

    /**
     * Executes the validation
     *
     * @param Validation $validation
     * @param $field
     * @return bool
     */
    public function validate(Validation $validation, $field): bool;
}
