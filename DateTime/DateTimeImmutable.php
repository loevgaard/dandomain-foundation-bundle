<?php
namespace Loevgaard\DandomainFoundationBundle\DateTime;

use DateTimeZone;

/**
 * This class represents a date time in Dandomain where the time zone is always Europe/Copenhagen
 */
class DateTimeImmutable extends \DateTimeImmutable {
    public function __construct($time = 'now', DateTimeZone $timezone = null)
    {
        if($timezone !== null) {
            throw new \InvalidArgumentException('Do not pass time zone as an argument');
        }

        if(strpos($time, '@') !== false) {
            throw new \InvalidArgumentException('Use DateTimeImmutable::createFromTimestamp instead');
        }

        parent::__construct($time, static::defaultTimeZone());
    }

    /**
     * @param \DateTimeInterface $dt
     *
     * @return static
     */
    public static function instance(\DateTimeInterface $dt)
    {
        if ($dt instanceof static) {
            return clone $dt;
        }
        return new static($dt->format('Y-m-d H:i:s.u'));
    }

    /**
     * @param string $format
     * @param string $time
     * @param null $timezone
     * @return DateTimeImmutable
     */
    public static function createFromFormat($format, $time, $timezone = null)
    {
        if($timezone !== null) {
            throw new \InvalidArgumentException('Do not pass time zone as an argument');
        }

        $dt = parent::createFromFormat($format, $time, static::defaultTimeZone());
        return static::instance($dt);
    }

    /**
     * @param \DateTime $dateTime
     * @return DateTimeImmutable
     */
    public static function createFromMutable($dateTime)
    {
        $dt = parent::createFromMutable($dateTime);
        return static::instance($dt);
    }

    /**
     * @param $timestamp
     * @return DateTimeImmutable
     */
    public static function createFromTimestamp($timestamp)
    {
        $dateTime = new \DateTime('@'.$timestamp);
        $dateTime->setTimezone(static::defaultTimeZone());
        return static::instance($dateTime);
    }

    /**
     * Returns the default Dandomain time zone
     *
     * @return DateTimeZone
     */
    public static function defaultTimeZone() {
        return new \DateTimeZone('Europe/Copenhagen');
    }
}