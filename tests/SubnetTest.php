<?php

/**
 * Copyright (C) 2016-17 Benjamin Heisig
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Benjamin Heisig <https://benjamin.heisig.name/>
 * @copyright Copyright (C) 2016-17 Benjamin Heisig
 * @license http://www.gnu.org/licenses/agpl-3.0 GNU Affero General Public License (AGPL)
 * @link https://github.com/bheisig/i-doit-api-client-php
 */

use bheisig\idoitapi\Subnet;

class SubnetTest extends BaseTest {

    /**
     * @var \bheisig\idoitapi\Subnet
     */
    protected $instance;

    public function setUp() {
        parent::setUp();

        $this->instance = new Subnet($this->api);
    }

    public function testLoad() {
        // "Global v4"
        $result = $this->instance->load($this->getIPv4Net());

        $this->assertInstanceOf(Subnet::class, $result);
    }

    public function testHasNext() {
        // "Global v4"
        $result = $this->instance->load($this->getIPv4Net())->hasNext();

        $this->assertTrue($result);
    }

    public function testNext() {
        // "Global v4"
        $result = $this->instance->load($this->getIPv4Net())->next();

        $this->assertInternalType('string', $result);
    }

    public function testIsFree() {
        // "Global v4"
        $result = $this->instance->load($this->getIPv4Net())->isFree($this->generateIPv4Address());

        $this->assertInternalType('boolean', $result);
    }

}
