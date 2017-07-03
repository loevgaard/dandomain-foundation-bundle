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

        parent::__construct($time);

        // we use setTimezone instead of injecting the timezone in the constructor
        // because the $time can be a timestamp and if it is, the timezone
        // has to be set after the object is instantiated
        return $this->setTimezone(static::defaultTimeZone());
    }

    /**
     * @inheritdoc
     */
    public static function createFromFormat($format, $time, $timezone = null)
    {
        if($timezone !== null) {
            throw new \InvalidArgumentException('Do not pass time zone as an argument');
        }

        return parent::createFromFormat($format, $time, static::defaultTimeZone());
    }

    /**
     * @inheritdoc
     */
    public static function createFromMutable($dateTime)
    {
        return parent::createFromMutable($dateTime)->setTimezone(static::defaultTimeZone());
    }

    /**
     * Returns the default Dandomain time zone
     *
     * @return DateTimeZone
     */
    public static function defaultTimeZone() {
        return DateTime::defaultTimeZone();
    }
}