<?php

declare(strict_types=1);

namespace Eurega\Shared\Infrastructure\Bus\Query\InMemory;

use Eurega\Shared\Domain\Bus\Query\Query;
use Eurega\Shared\Domain\Bus\Query\QueryBus;
use Eurega\Shared\Domain\Bus\Query\Response;
use Eurega\Shared\Infrastructure\Bus\CallableFirstParameterExtractor;
use Eurega\Shared\Infrastructure\Bus\Query\QueryNotRegisteredError;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;
use Symfony\Component\Messenger\Stamp\HandledStamp;

final readonly class InMemorySymfonyQueryBus implements QueryBus
{
	private MessageBus $bus;

	public function __construct(iterable $queryHandlers = [])
	{
		$this->bus = new MessageBus(
			[
				new HandleMessageMiddleware(
					new HandlersLocator(
						CallableFirstParameterExtractor::forCallables($queryHandlers)
					)
				),
			]
		);
	}

	public function ask(Query $query): ?Response
	{
		try {
			/** @var HandledStamp $stamp */
			$stamp = $this->bus->dispatch($query)->last(HandledStamp::class);

			return $stamp->getResult();
		} catch (NoHandlerForMessageException) {
			throw new QueryNotRegisteredError($query);
		}
	}
}