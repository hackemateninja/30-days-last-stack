<?php

namespace App\Factory;

use App\Entity\Voyage;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Voyage>
 */
final class VoyageFactory extends PersistentProxyObjectFactory
{
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
        return Voyage::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
	    return [
		    'leaveAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTimeBetween('+1 day', '+1 year')),
		    'planet' => PlanetFactory::new(),
		    'purpose' => self::faker()->text(80),
	    ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Voyage $voyage): void {})
        ;
    }
}
