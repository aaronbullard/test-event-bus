<?php

namespace Geolocation;

final class Geolocation
{
    private $latitude;
    private $longitude;

    public function __construct()
    {
    }

    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }
}