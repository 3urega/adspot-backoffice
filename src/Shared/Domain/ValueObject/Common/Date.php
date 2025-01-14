<?php
declare(strict_types=1);

namespace Eurega\Shared\Domain\ValueObject\Common;

use DateTimeZone;
use Eurega\Shared\Domain\Exception\ValueObject\DateIsNotValid;

final class Date
{
    /** @var string */
    public const DATE_EUROPE = 'd/m/Y';

    /** @var string */
    public const DATE_EUROPE_SHORT = 'd/m/y';

    /** @var string */
    public const TIMESTAMP_FORMAT = 'U';

    /** @var string */
    public const TIMEZONE = 'Europe/Madrid';

    private int $year;
    private int $month;
    private int $day;

    private function __construct(int $year, int $month, int $day)
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

    /**
     * @throws DateIsNotValid
     */
    public static function createFromYearMonthAndDay(int $year, int $month, int $day): self
    {
        if (!checkdate($month, $day, $year)) {
            throw DateIsNotValid::becauseYearMonthAndDayCombinationIsNotValid($year, $month, $day);
        }

        return new self(
            $year,
            $month,
            $day
        );
    }

    public static function createFromDateTime(\DateTimeInterface $dateTime): self
    {
        return self::createFromYearMonthAndDay(
            (int) $dateTime->format('Y'),
            (int) $dateTime->format('m'),
            (int) $dateTime->format('d')
        );
    }

    /**
     * @throws DateIsNotValid
     */
    public static function createFromString(string $date): self
    {
        try {
            return self::createFromDateTime(
                new \DateTimeImmutable(
                    $date,
                    new \DateTimeZone(
                        self::TIMEZONE
                    )
                )
            );
        } catch (\Exception $e) {
            throw DateIsNotValid::becauseStringDoesNotHaveAValidFormat($date);
        }
    }

    /**
     * @throws DateTimeIsNotValid
     */
    public static function createFromFormat(
        string $date, 
        string $format = self::DATE_EUROPE_SHORT
    ): self
    {
        try {
            return self::createFromDateTime(
                \DateTimeImmutable::createFromFormat(
                    $format,
                    $date,
                    new DateTimeZone(Date::TIMEZONE)
                )
            );
        } catch (\Throwable $e) {
            throw DateIsNotValid::becauseStringDoesNotHaveAValidFormat($date);
        }
    }


    public static function today(): self
    {
        return self::createFromDateTime(
            (new \DateTimeImmutable('now', new \DateTimeZone(self::TIMEZONE)))->setTimestamp(time())
        );
    }

    public function equalsTo(Date $anotherDate): bool
    {
        return $this->year === $anotherDate->year
            && $this->month === $anotherDate->month
            && $this->day === $anotherDate->day
            ;
    }

    public function format(string $format = self::DATE_EUROPE): string
    {
        return $this->asDateTime()->format($format);
    }

    public function asTimestamp(): int
    {
        return (int) $this->asDateTime()->format(self::TIMESTAMP_FORMAT);
    }

    public function asDateTime(): \DateTimeImmutable
    {
        $date = new \DateTimeImmutable();
        $date = $date->setDate($this->year, $this->month, $this->day);
        $date = $date->setTime(0, 0);
        $date = $date->setTimezone(new \DateTimeZone(self::TIMEZONE));

        return $date;
    }
}
