<?php

declare(strict_types=1);

namespace Tests\Shared\Infrastructure\PhpUnit;

// use CodelyTv\Tests\Shared\Infrastructure\PhpUnit\Comparator\AggregateRootArraySimilarComparator;
// use CodelyTv\Tests\Shared\Infrastructure\PhpUnit\Comparator\DateTimeSimilarComparator;
// use CodelyTv\Tests\Shared\Infrastructure\PhpUnit\Comparator\DateTimeStringSimilarComparator;
// use CodelyTv\Tests\Shared\Infrastructure\PhpUnit\Comparator\DomainEventArraySimilarComparator;
// use CodelyTv\Tests\Shared\Infrastructure\PhpUnit\Comparator\DomainEventSimilarComparator;
use Override;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\ExpectationFailedException;
use SebastianBergmann\Comparator\ComparisonFailure;

use SebastianBergmann\Comparator\Factory;
use Tests\Shared\Infrastructure\PhpUnit\Comparator\AggregateRootSimilarComparator;

use function is_string;
use function sprintf;

// Based on \PHPUnit\Framework\Constraint\IsEqual
final readonly class ConstraintIsSimilar extends Constraint {

	public function __construct(
		private mixed $value, 
		private readonly float $delta = 0.0
	) {}

	#[Override]
	public function evaluate($other, $description = '', $returnResult = false): bool
	{
		if ($this->value === $other) {
			return true;
		}

		$isValid = true;
		$comparatorFactory = new Factory();

		$comparatorFactory->register(new AggregateRootSimilarComparator());

		try {
			$comparator = $comparatorFactory->getComparatorFor($other, $this->value);

			$comparator->assertEquals($this->value, $other, $this->delta);
		} catch (ComparisonFailure $f) {
			if (!$returnResult) {
				throw new ExpectationFailedException(trim($description . "\n" . $f->getMessage()), $f);
			}

			$isValid = false;
		}

		return $isValid;
	}

	#[Override]
	public function toString(): string
	{
		$delta = '';

		if (is_string($this->value)) {
			if (str_contains($this->value, "\n")) {
				return 'is equal to <text>';
			}

			return sprintf("is equal to '%s'", $this->value);
		}

		if ($this->delta !== 0) {
			$delta = sprintf(' with delta <%F>', $this->delta);
		}

		return sprintf('is equal to %s%s', ' ', $delta); // $this->exporter()->export($this->value)
	}
}
