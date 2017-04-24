<?php
/*
 * This file is part of the Vocento Software.
 *
 * (c) Vocento S.A., <desarrollo.dts@vocento.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace tests\AppBundle\Model;

use AppBundle\Model\Result;
use DateTime;
use PHPUnit\Framework\TestCase;


/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 */
class ResultTest extends TestCase
{
    public function shouldReturnABedroom()
    {
        $result = new Result();

        $result->setDatetime(new \DateTime());

        $this->assertInstanceOf(DateTime::class, $result);
    }
}