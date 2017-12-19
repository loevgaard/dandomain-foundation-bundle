<?php

namespace Loevgaard\DandomainFoundationBundle;

use Loevgaard\DandomainFoundationBundle\DateTime\DateTimeImmutable;

/**
 * Return a \DateTime|\DateTimeImmutable object based on a json string, i.e. '/Date(1484759471000+0100)/'.
 *
 * @param string $date
 * @param bool   $immutable
 *
 * @return DateTimeImmutable
 */
function jsonDateToDate($date)
{
    preg_match('/([0-9]+)\+/', $date, $matches);
    if (!isset($matches[1])) {
        throw new \InvalidArgumentException('$date is not a valid JSON date. Input: '.$date);
    }
    // remove the last three digits since the json date is given in milliseconds
    $timestamp = substr($matches[1], 0, -3);

    // timestamps will always be given in the UTC time zone
    return DateTimeImmutable::createFromTimestamp('@'.$timestamp);
}

/**
 * @param \DateTimeImmutable $startDate
 * @param \DateTimeImmutable $endDate
 * @param \DateInterval      $interval
 *
 * @return \Generator|array
 */
function datePeriodSteps(\DateTimeImmutable $startDate, \DateTimeImmutable $endDate, \DateInterval $interval): \Generator
{
    if ($startDate > $endDate) {
        throw new \InvalidArgumentException('Start date is after end date');
    }

    $steps = new \DatePeriod($startDate, $interval, $endDate);
    $first = true;

    foreach ($steps as $startStep) {
        /** @var \DateTimeImmutable $startStep */
        $endStep = $startStep->add($interval);

        /*
         * If it's the second round of the loop we want to add 1 second to the start step
         * This will have the effect that there are no overlapping periods
         */
        if ($first) {
            $first = false;
        } else {
            $startStep = $startStep->add(new \DateInterval('PT1S'));
        }

        // if the end step is higher than the end date we change the end step
        if ($endStep > $endDate) {
            $endStep = $endDate;
        }

        // if the start step is after the end step we just continue, which practically means that the loop ends
        if ($startStep > $endStep) {
            continue;
        }

        yield [
            'startStep' => $startStep,
            'endStep' => $endStep,
        ];
    }
}
