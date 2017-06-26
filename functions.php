<?php
namespace Loevgaard\DandomainFoundationBundle;

/**
 * Return a \DateTime|\DateTimeImmutable object based on a json string, i.e. '/Date(1484759471000+0100)/'
 *
 * @param string $date
 * @param bool $immutable
 * @return \DateTime|\DateTimeImmutable
 */
function jsonDateToDate($date, $immutable = false) {
    preg_match('/([0-9]+)\+/', $date, $matches);
    if(!isset($matches[1])) {
        throw new \InvalidArgumentException('$date is not a valid JSON date. Input: ' . $date);
    }
    // remove the last three digits since the json date is given in milliseconds
    $timestamp = substr($matches[1], 0, -3);

    // we use the UTC timezone at first since unix timestamps are always given in the UTC timezone
    $dateTime = new \DateTime('@' . $timestamp, new \DateTimeZone('UTC'));

    // Dandomain is always using this timezone
    $timeZone = new \DateTimeZone('Europe/Copenhagen');
    $dateTime->setTimezone($timeZone);

    if($immutable) {
        return \DateTimeImmutable::createFromMutable($dateTime);
    }

    return $dateTime;
}

/**
 * Returns a \DateTime|\DateTimeImmutable object with the right timezone
 *
 * @param string $time
 * @param bool $immutable
 * @return \DateTime|\DateTimeImmutable
 */
function getDateTime($time = 'now', $immutable = false) {
    if($immutable) {
        $dateTime = new \DateTimeImmutable('now', new \DateTimeZone('Europe/Copenhagen'));
    } else {
        $dateTime = new \DateTime('now', new \DateTimeZone('Europe/Copenhagen'));
    }

    return $dateTime;
}