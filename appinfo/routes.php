<?php

declare(strict_types=1);


/**
 * Circles - Bring cloud-users closer together.
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Maxence Lange <maxence@artificial-owl.com>
 * @copyright 2017
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */


return [
	'ocs' => [
		['name' => 'Local#circles', 'url' => '/circles', 'verb' => 'GET'],
		['name' => 'Local#create', 'url' => '/circles', 'verb' => 'POST'],
		['name' => 'Local#search', 'url' => '/search', 'verb' => 'GET'],
		['name' => 'Local#members', 'url' => '/circles/{circleId}/members', 'verb' => 'GET'],
		['name' => 'Local#memberAdd', 'url' => '/circles/{circleId}/members', 'verb' => 'POST'],
		[
			'name' => 'Local#memberRemove', 'url' => '/circles/{circleId}/members/{memberId}',
			'verb' => 'DELETE'
		],
		[
			'name' => 'Local#memberLevel', 'url' => '/circles/{circleId}/members/{memberId}/level',
			'verb' => 'PUT'
		],
		['name' => 'Local#circleJoin', 'url' => '/circles/{circleId}/join', 'verb' => 'PUT'],
		['name' => 'Local#circleLeave', 'url' => '/circles/{circleId}/leave', 'verb' => 'PUT'],

		// to implement
		['name' => 'Local#getSettings', 'url' => '/circles/{circleId}/settings', 'verb' => 'GET'],
		['name' => 'Local#setSettings', 'url' => '/circles/{circleId}/settings', 'verb' => 'PUT']
	],

	'routes' => [
		['name' => 'Shares#initShareDelivery', 'url' => '/v1/payload', 'verb' => 'POST'],
		['name' => 'Shares#create', 'url' => '/v1/circles/{circleUniqueId}/share', 'verb' => 'PUT'],


		['name' => 'EventWrapper#asyncBroadcast', 'url' => '/async/{token}/', 'verb' => 'POST'],
		//		['name' => 'EventWrapper#broadcast', 'url' => '/v1/gs/broadcast', 'verb' => 'POST'],
		//		['name' => 'EventWrapper#status', 'url' => '/v1/gs/status', 'verb' => 'POST'],

		['name' => 'Remote#appService', 'url' => '/', 'verb' => 'GET'],
		['name' => 'Remote#test', 'url' => '/test/', 'verb' => 'GET'],
		['name' => 'Remote#event', 'url' => '/event/', 'verb' => 'POST'],
		['name' => 'Remote#incoming', 'url' => '/incoming/', 'verb' => 'POST'],
		['name' => 'Remote#circles', 'url' => '/circles/', 'verb' => 'GET'],
		['name' => 'Remote#circle', 'url' => '/circle/{circleId}/', 'verb' => 'GET'],
		['name' => 'Remote#members', 'url' => '/members/{circleId}/', 'verb' => 'GET'],
		['name' => 'Remote#member', 'url' => '/member/{type}/{userId}/', 'verb' => 'GET']
	]
];
