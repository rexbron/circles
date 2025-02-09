<?php

declare(strict_types=1);


/**
 * Circles - Bring cloud-users closer together.
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Maxence Lange <maxence@artificial-owl.com>
 * @copyright 2021
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


namespace OCA\Circles\Model\Probes;

use OCA\Circles\Model\Circle;

/**
 * Class CircleProbe
 *
 * @package OCA\Circles\Model\Probes
 */
class CircleProbe extends MemberProbe {


	/** @var int */
	private $include = 0;

	/** @var int */
	private $filter = Circle::CFG_SINGLE;

	/** @var bool */
	private $includeNonVisible = false;
	/** @var bool */
	private $visitSingleCircles = false;


	/**
	 * CircleProbe constructor.
	 */
	public function __construct() {
	}


	/**
	 * Configure whether personal circles are included in the probe
	 *
	 * @param bool $include
	 *
	 * @return $this
	 */
	public function includePersonalCircles(bool $include = true): self {
		$this->include |= Circle::CFG_PERSONAL;
		if (!$include) {
			$this->include -= Circle::CFG_PERSONAL;
		}

		return $this;
	}

	/**
	 * Configure whether single circles are included in the probe
	 *
	 * @param bool $include
	 *
	 * @return $this
	 */
	public function includeSingleCircles(bool $include = true): self {
		$this->include |= Circle::CFG_SINGLE;
		if (!$include) {
			$this->include -= Circle::CFG_SINGLE;
		}

		return $this;
	}

	/**
	 * Configure whether system circles are included in the probe
	 *
	 * @param bool $include
	 *
	 * @return $this
	 */
	public function includeSystemCircles(bool $include = true): self {
		$this->include |= Circle::CFG_SYSTEM;
		if (!$include) {
			$this->include -= Circle::CFG_SYSTEM;
		}

		return $this;
	}

	/**
	 * Configure whether hidden circles are included in the probe
	 *
	 * @param bool $include
	 *
	 * @return $this
	 */
	public function includeHiddenCircles(bool $include = true): self {
		$this->include |= Circle::CFG_HIDDEN;
		if (!$include) {
			$this->include -= Circle::CFG_HIDDEN;
		}

		return $this;
	}

	/**
	 * Configure whether backend circles are included in the probe
	 *
	 * @param bool $include
	 *
	 * @return $this
	 */
	public function includeBackendCircles(bool $include = true): self {
		$this->include |= Circle::CFG_BACKEND;
		if (!$include) {
			$this->include -= Circle::CFG_BACKEND;
		}

		return $this;
	}

	/**
	 * Configure whether non-visible circles are included in the probe
	 *
	 * @param bool $include
	 *
	 * @return $this
	 */
	public function includeNonVisibleCircles(bool $include = true): self {
		$this->includeNonVisible = $include;

		return $this;
	}

	/**
	 * Return whether non-visible circles are included in the probe
	 *
	 * @return bool
	 */
	public function nonVisibleCirclesIncluded(): bool {
		return $this->includeNonVisible;
	}


	/**
	 * Configure whether single circles are visited in the probe
	 *
	 * @param bool $visit
	 *
	 * @return $this
	 */
	public function visitSingleCircles(bool $visit = true): self {
		$this->visitSingleCircles = $visit;

		return $this;
	}

	/**
	 * Return whether single circles are visited in the probe
	 *
	 * @return bool
	 */
	public function visitingSingleCircles(): bool {
		return $this->visitSingleCircles;
	}


	/**
	 * Return the include value
	 *
	 * @return int
	 */
	public function included(): int {
		return $this->include;
	}

	/**
	 * Return whether a config is included in the probe (bitwise comparison)
	 *
	 * @param int $config
	 *
	 * @return bool
	 */
	public function isIncluded(int $config): bool {
		return (($this->included() & $config) !== 0);
	}


	/**
	 * Configure whether personal circles are filtered in the probe
	 *
	 * @param bool $filter
	 *
	 * @return $this
	 */
	public function filterPersonalCircles(bool $filter = true): self {
		$this->filter |= Circle::CFG_PERSONAL;
		if (!$filter) {
			$this->filter -= Circle::CFG_PERSONAL;
		}

		return $this;
	}

	/**
	 * Configure whether single circles are filtered in the probe
	 *
	 * @param bool $filter
	 *
	 * @return $this
	 */
	public function filterSingleCircles(bool $filter = true): self {
		$this->filter |= Circle::CFG_SINGLE;
		if (!$filter) {
			$this->filter -= Circle::CFG_SINGLE;
		}

		return $this;
	}

	/**
	 * Configure whether system circles are filtered in the probe
	 *
	 * @param bool $filter
	 *
	 * @return $this
	 */
	public function filterSystemCircles(bool $filter = true): self {
		$this->filter |= Circle::CFG_SYSTEM;
		if (!$filter) {
			$this->filter -= Circle::CFG_SYSTEM;
		}

		return $this;
	}

	/**
	 * Configure whether hidden circles are filtered in the probe
	 *
	 * @param bool $filter
	 *
	 * @return $this
	 */
	public function filterHiddenCircles(bool $filter = true): self {
		$this->filter |= Circle::CFG_HIDDEN;
		if (!$filter) {
			$this->filter -= Circle::CFG_HIDDEN;
		}

		return $this;
	}

	/**
	 * Configure whether backend circles are filtered in the probe
	 *
	 * @param bool $filter
	 *
	 * @return $this
	 */
	public function filterBackendCircles(bool $filter = true): self {
		$this->filter |= Circle::CFG_BACKEND;
		if (!$filter) {
			$this->filter -= Circle::CFG_BACKEND;
		}

		return $this;
	}


	/**
	 * Add a config to the probe filter
	 *
	 * @param int $config
	 * @param bool $filter
	 *
	 * @return $this
	 */
	public function filterConfig(int $config, bool $filter = true): self {
		$this->filter |= $config;
		if (!$filter) {
			$this->filter -= $config;
		}

		return $this;
	}


	/**
	 * Return the filtered value
	 *
	 * @return int
	 */
	public function filtered(): int {
		return $this->filter;
	}

	/**
	 * Return whether a config is filtered in the probe (bitwise comparison)
	 *
	 * @param int $config
	 *
	 * @return bool
	 */
	public function isFiltered(int $config): bool {
		return (($this->filtered() & $config) !== 0);
	}


	/**
	 * Return an array with includes as options
	 *
	 * @return array
	 */
	public function getAsOptions(): array {
		return array_merge(
			[
				'included' => $this->included(),
				'includeHiddenCircles' => $this->isIncluded(Circle::CFG_HIDDEN),
				'includeSingleCircles' => $this->isIncluded(Circle::CFG_SINGLE),
				'includeBackendCircles' => $this->isIncluded(Circle::CFG_BACKEND),
				'includeSystemCircles' => $this->isIncluded(Circle::CFG_SYSTEM),
				'includePersonalCircles' => $this->isIncluded(Circle::CFG_PERSONAL),
				'includeNonVisibleCircles' => $this->nonVisibleCirclesIncluded(),
				'visitingSingleCircles' => $this->visitingSingleCircles(),
				'filtered' => $this->included(),
				'filterHiddenCircles' => $this->isIncluded(Circle::CFG_HIDDEN),
				'filterSingleCircles' => $this->isIncluded(Circle::CFG_SINGLE),
				'filterBackendCircles' => $this->isIncluded(Circle::CFG_BACKEND),
				'filterSystemCircles' => $this->isIncluded(Circle::CFG_SYSTEM),
				'filterPersonalCircles' => $this->isIncluded(Circle::CFG_PERSONAL),
			],
			parent::getAsOptions()
		);
	}


	/**
	 * Return a JSON object with includes as options
	 *
	 * @return array
	 */
	public function JsonSerialize(): array {
		return $this->getAsOptions();
	}
}
