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

namespace Phalcon\Validation\Validator;

use Phalcon\Validation;
use Phalcon\Validation\AbstractValidator;

/**
 * Check for alphanumeric character(s)
 *
 * ```php
 * use Phalcon\Validation;
 * use Phalcon\Validation\Validator\Alnum as AlnumValidator;
 *
 * $validator = new Validation();
 *
 * $validator->add(
 *     "username",
 *     new AlnumValidator(
 *         [
 *             "message" => ":field must contain only alphanumeric characters",
 *         ]
 *     )
 * );
 *
 * $validator->add(
 *     [
 *         "username",
 *         "name",
 *     ],
 *     new AlnumValidator(
 *         [
 *             "message" => [
 *                 "username" => "username must contain only alphanumeric characters",
 *                 "name"     => "name must contain only alphanumeric characters",
 *             ],
 *         ]
 *     )
 * );
 * ```
 */
class Alnum extends AbstractValidator
{
    protected $template = "Field :field must contain only letters and numbers";

    /**
     * Executes the validation
     *
     * @param Validation $validation
     * @param $field
     * @return bool
     * @throws Validation\Exception
     */
    public function validate(Validation $validation, $field): bool
    {
        $value = $validation->getValue($field);

        if (!ctype_alnum($value)) {
            $validation->appendMessage(
                $this->messageFactory($validation, $field)
            );

            return false;
        }

        return true;
    }
}
