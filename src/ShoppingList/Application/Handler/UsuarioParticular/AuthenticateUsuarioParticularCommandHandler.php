<?php
namespace Eurega\ShoppingList\Application\Command\UsuarioParticular;

use Eurega\Shared\Domain\Bus\Command\CommandHandler;
use Eurega\ShoppingList\Infrastructure\Security\Symfony\LoginUserInteractive;

class AuthenticateUsuarioParticularCommand implements CommandHandler
{
	public function __construct(
		private LoginUserInteractive $logger
	) {}

	public function handle(AuthenticateUsuarioParticularCommand $command): void {

		$this->logger->doLogin( 
			$command->uid()
		);
	}
}