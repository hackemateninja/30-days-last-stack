<?php

namespace App\Factory;

use App\Entity\Planet;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Planet>
 */
final class PlanetFactory extends PersistentProxyObjectFactory
{
	public const PLANET_NAMES = [
		'Mercury',
		'Venus',
		'Earth',
		'Mars',
		'Jupiter',
		'Saturn',
		'Uranus',
		'Neptune',
	];

	public const OTHER_PLANET_NAMES = [
		'Proxima Centauri b',
		'Kepler-186f',
		'Kepler-62e',
		'Kepler-62f',
	];

	/**
	 * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
	 *
	 * @todo inject services if required
	 */
	public function __construct()
	{
	}

	public static function class(): string
	{
		return Planet::class;
	}

	/**
	 * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
	 *
	 * @todo add your default values here
	 */
	protected function defaults(): array|callable
	{
		return [
			'description' => self::faker()->text(),
			'lightYearsFromEarth' => self::faker()->randomFloat(),
			'name' => self::faker()->randomElement(self::PLANET_NAMES),
			'imageFilename' => 'planet-'.self::faker()->numberBetween(1, 4).'.png',
		];
	}

	/**
	 * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
	 */
	protected function initialize(): static
	{
		return $this
			// ->afterInstantiate(function(Planet $planet): void {})
		;
	}
}
