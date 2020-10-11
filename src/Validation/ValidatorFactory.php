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

use Phalcon\Factory\AbstractFactory;

/**
 * Class ValidatorFactory
 *
 * @package Phalcon\Validation
 */
class ValidatorFactory extends AbstractFactory
{
    /**
     * TagFactory constructor.
     *
     * @param array $services
     */
    public function __construct(array $services = [])
    {
        $this->init($services);
    }

    /**
     * Creates a new instance
     *
     * @param string $name
     * @return ValidatorInterface
     */
    public function newInstance(string $name): ValidatorInterface
    {
        $definition = $this->getService($name);

        return create_instance($definition);
    }

    protected function getAdapters(): array
    {
        return [
            "alnum" => "Phalcon\\Validation\\Validator\\Alnum",
            "alpha" => "Phalcon\\Validation\\Validator\\Alpha",
            "between" => "Phalcon\\Validation\\Validator\\Between",
            "callback" => "Phalcon\\Validation\\Validator\\Callback",
            "confirmation" => "Phalcon\\Validation\\Validator\\Confirmation",
            "creditCard" => "Phalcon\\Validation\\Validator\\CreditCard",
            "date" => "Phalcon\\Validation\\Validator\\Date",
            "digit" => "Phalcon\\Validation\\Validator\\Digit",
            "email" => "Phalcon\\Validation\\Validator\\Email",
            "exception" => "Phalcon\\Validation\\Validator\\Exception",
            "exclusionIn" => "Phalcon\\Validation\\Validator\\ExclusionIn",
            "file" => "Phalcon\\Validation\\Validator\\File",
            "identical" => "Phalcon\\Validation\\Validator\\Identical",
            "inclusionIn" => "Phalcon\\Validation\\Validator\\InclusionIn",
            "ip" => "Phalcon\\Validation\\Validator\\Ip",
            "numericality" => "Phalcon\\Validation\\Validator\\Numericality",
            "presenceOf" => "Phalcon\\Validation\\Validator\\PresenceOf",
            "regex" => "Phalcon\\Validation\\Validator\\Regex",
            "stringLength" => "Phalcon\\Validation\\Validator\\StringLength",
            "uniqueness" => "Phalcon\\Validation\\Validator\\Uniqueness",
            "url" => "Phalcon\\Validation\\Validator\\Url"
        ];
    }
}
