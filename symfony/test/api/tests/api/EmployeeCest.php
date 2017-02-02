<?php

/**
 * OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures
 * all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM is free software; you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
 * Boston, MA  02110-1301, USA
 */
class EmployeeDetailCest
{
    public function _before(ApiTester $I)
    {
        $fixture = dirname(__FILE__) . '/fixtures/employee.yml';
        TestDataService::populate($fixture);
    }

    public function _after(ApiTester $I)
    {
    }

    public function invalidEmployeeIdTest(ApiTester $I)
    {
        $I->wantTo('Test Invalid employee Id');
        $I->amBearerAuthenticated($I->getDefaultToken());
        $I->sendGET('api/v1/employee/10000');
        $I->seeResponseCodeIs(404);
    }

    public function getSpecificEmployeeTest(ApiTester $I)
    {
        $I->wantTo('Employee Detail test');
        $I->amBearerAuthenticated($I->getDefaultToken());
        $I->sendGET('api/v1/employee/1');
        $I->seeResponseCodeIs(200);
        //$I->seeResponseContains('{"data":{"id":"1","operational_country_id":"1","mon":"0","tue":"0","wed":"0","thu":"0","fri":"0","sat":"4","sun":"8"}}');
    }

}
