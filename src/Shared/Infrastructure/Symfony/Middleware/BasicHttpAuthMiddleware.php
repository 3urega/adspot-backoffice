<?php

declare(strict_types=1);

namespace Eurega\Shared\Infrastructure\Symfony\Middleware;
use Kreait\Firebase\Auth\UserRecord;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

final readonly class BasicHttpAuthMiddleware
{
	public function __construct(
	) {}

	public function onKernelRequest(RequestEvent $event): void
	{
		$shouldAuthenticate = $event->getRequest()->attributes->get('auth', false);

		if ($shouldAuthenticate) {
			$authHeader  = $event->getRequest()->headers->get('Authorization');

			$this->hasIntroducedCredentials($authHeader)
				? $this->authenticate($authHeader, $event)
				: $this->askForCredentials($event);
		} else {
			
		}
	}

	private function hasIntroducedCredentials(?string $authHeader): bool
	{
		return $authHeader !== null;
	}

	private function authenticate(string $authHeader, RequestEvent $event): void {
		
	}

	private function addUserDataToRequest(UserRecord $firebaseUser, RequestEvent $event): void
	{
		$event->getRequest()->attributes->set('authenticated_user', $firebaseUser);
	}

	private function askForCredentials(RequestEvent $event): void
	{
		$event->setResponse(
			new Response('', Response::HTTP_UNAUTHORIZED, [
				'WWW-Authenticate' => 'Basic realm="Eurega"',
			])
		);
	}
}
