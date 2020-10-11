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

use Phalcon\Validation\AbstractValidator;

class Ip extends AbstractValidator
{
    public const VERSION_4 = FILTER_FLAG_IPV4;
    public const VERSION_6 = FILTER_FLAG_IPV6;
}
