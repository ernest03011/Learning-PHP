<?php

declare(strict_types=1);

function calculateAge($birthDate) : DateInterval | bool
{

  $currentDate = new DateTime();
  $birthDate = new DateTime($birthDate);

  if ($birthDate > $currentDate) {
    return false;
  }

  $age = $currentDate->diff($birthDate);

  return $age;
}

function formatAge(DateInterval $age) : int
{
  $age = $age->format('%y years');
  $age = (int) $age;

  return $age;
}