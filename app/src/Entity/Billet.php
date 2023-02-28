<?php

namespace App\Entity;

use App\Repository\BilletRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BilletRepository::class)]
class Billet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $passenger_firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $passenger_lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $passenger_sexe = null;

    #[ORM\Column(length: 255)]
    private ?string $company = null;

    #[ORM\Column(length: 255)]
    private ?string $destination = null;

    #[ORM\Column(length: 255)]
    private ?string $origin = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_hour_departure = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_hour_arrival = null;

    #[ORM\Column]
    private ?int $flight_number = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPassengerFirstname(): ?string
    {
        return $this->passenger_firstname;
    }

    public function setPassengerFirstname(string $passenger_firstname): self
    {
        $this->passenger_firstname = $passenger_firstname;

        return $this;
    }

    public function getPassengerLastname(): ?string
    {
        return $this->passenger_lastname;
    }

    public function setPassengerLastname(string $passenger_lastname): self
    {
        $this->passenger_lastname = $passenger_lastname;

        return $this;
    }

    public function getPassengerSexe(): ?string
    {
        return $this->passenger_sexe;
    }

    public function setPassengerSexe(string $passenger_sexe): self
    {
        $this->passenger_sexe = $passenger_sexe;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function getDateHourDeparture(): ?\DateTimeInterface
    {
        return $this->date_hour_departure;
    }

    public function setDateHourDeparture(\DateTimeInterface $date_hour_departure): self
    {
        $this->date_hour_departure = $date_hour_departure;

        return $this;
    }

    public function getDateHourArrival(): ?\DateTimeInterface
    {
        return $this->date_hour_arrival;
    }

    public function setDateHourArrival(\DateTimeInterface $date_hour_arrival): self
    {
        $this->date_hour_arrival = $date_hour_arrival;

        return $this;
    }

    public function getFlightNumber(): ?int
    {
        return $this->flight_number;
    }

    public function setFlightNumber(int $flight_number): self
    {
        $this->flight_number = $flight_number;

        return $this;
    }
}
