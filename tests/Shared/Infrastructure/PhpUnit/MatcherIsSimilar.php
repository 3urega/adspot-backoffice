<?php

declare(strict_types=1);

namespace Tests\Shared\Infrastructure\PhpUnit;

use Mockery\Matcher\MatcherAbstract;
use Override;
use Stringable;

final class MatcherIsSimilar extends MatcherAbstract implements Stringable
{
	private readonly ConstraintIsSimilar $constraint;

	public function __construct(mixed $value, float $delta = 0.0) {

		$this->constraint = new ConstraintIsSimilar($value, $delta);
	}

	#[Override]
	public function match(&$actual): bool {
		return $this->constraint->evaluate($actual, '', true);
	}

	#[Override]
	public function __toString(): string
	{
		return 'Is similar';
	}
}
