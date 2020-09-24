<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Tests\Integration\Storage\Serializer\Php;

use Codeception\Example;
use Codeception\Stub;
use Phalcon\Storage\Serializer\Php;
use stdClass;
use UnitTester;

use function serialize;

class SerializeCest
{
    /**
     * Tests Phalcon\Storage\Serializer\Php :: serialize()
     *
     * @dataProvider getExamples
     *
     * @param UnitTester $I
     * @param Example    $example
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function storageSerializerPhpSerialize(UnitTester $I, Example $example)
    {
        $I->wantToTest('Storage\Serializer\Php - serialize() - ' . $example[0]);

        $serializer = new Php($example[1]);

        $expected = $example[2];
        $actual   = $serializer->serialize();

        $I->assertEquals($expected, $actual);
    }

    /**
     * Tests Phalcon\Storage\Serializer\Php :: serialize() return empty string
     *
     * @param UnitTester $I
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function storageSerializerPhpSerializeReturnEmptyString(UnitTester $I)
    {
        $I->wantToTest('Storage\Serializer\Php - serialize() - return empty string');

        $serializer = Stub::make(
            Php::class,
            [
                'internalSerialize' => false,
            ]
        );

        $serializer->setData('abcdef');
        $expected = '';
        $actual   = $serializer->serialize();

        $I->assertEquals($expected, $actual);
    }

    private function getExamples(): array
    {
        return [
            [
                'null',
                null,
                null,
            ],
            [
                'true',
                true,
                true,
            ],
            [
                'false',
                false,
                false,
            ],
            [
                'integer',
                1234,
                1234,
            ],
            [
                'float',
                1.234,
                1.234,
            ],
            [
                'string',
                'Phalcon Framework',
                serialize('Phalcon Framework'),
            ],
            [
                'array',
                ['Phalcon Framework'],
                serialize(['Phalcon Framework']),
            ],
            [
                'object',
                new stdClass(),
                serialize(new stdClass()),
            ],
        ];
    }
}
