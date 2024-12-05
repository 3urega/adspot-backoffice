<?php

declare(strict_types=1);

namespace Eurega\ShoppingList\Domain\Event\UsuarioParticular;

use Eurega\Shared\Domain\Bus\Event\DomainEvent;

final class UsuarioParticularLoginDomainEvent extends DomainEvent
{	
	/**
	 * @param id Id del agregado
	 * @param email
	 * @param eventId Si no se recibe se genera automáticamente
	 * @param occurredOn Si no se recibe se genera automáticamente
	 */
	public function __construct(
		private string $id,
		private readonly string $email,
		string $eventId = null,
		string $occurredOn = null
	) {
		parent::__construct($id, $eventId, $occurredOn);
	}

	public static function eventName(): string
	{
		return 'usuario.shoppinglist.logged';
	}

	public static function fromPrimitives(
		string $aggregateId,
		array $body,
		string $eventId,
		string $occurredOn
	): DomainEvent {
		return new self($aggregateId, $body['nombre'], $eventId, $occurredOn);
	}

	public function toPrimitives(): array
	{
		return [
			'id' => $this->id,
			'nombre' => $this->email
		];
	}

	public function id(): string
	{
		return $this->id;
	}
}
