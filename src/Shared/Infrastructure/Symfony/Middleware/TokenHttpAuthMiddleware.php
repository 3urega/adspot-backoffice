<?php

declare(strict_types=1);

namespace Eurega\Shared\Infrastructure\Symfony\Middleware;

use Eurega\Shared\Domain\Auth\VerifyToken;
use Kreait\Firebase\Auth\UserRecord;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

final readonly class TokenHttpAuthMiddleware
{
	// @TODO verifiToken issue
	private string $uid;

	public function __construct(
		private VerifyToken $verifyToken
	) {}

	public function onKernelRequest(RequestEvent $event): void
	{
		$shouldAuthenticate = $event->getRequest()->attributes->get('private', false);
		
		// @TODO verifiToken issue
		$this->uid = $event->getRequest()->query->get('uid');

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
			
			$firebaseUser = $this->verifyToken->verify($authHeader);
			if(!$firebaseUser) {
				throw new AccessDeniedHttpException('Access Denied. Invalid Firebase Token.');
			}
			$this->addUserDataToRequest($this->uid, $event);
	}

	private function addUserDataToRequest(string $uid, RequestEvent $event): void
	{
		$event->getRequest()->attributes->set('authenticated_user', $uid);
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
