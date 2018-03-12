<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="APP_ACCOUNTS")
 * @ORM\Entity(repositoryClass="App\Repository\AccountRepository")
 */
class Account
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $aid;

    /**
     * @ORM\Column(type="string", length=40, unique=false, nullable=false)
     */
    private $libelle;

//    /**
//     * @ORM\Column(type="string", length=40, unique=false, nullable=false)
//     */
//    private $number;

    /**
     * @ORM\Column(type="integer", length=1, unique=false, nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(type="integer", length=100, unique=false, nullable=false)
     */
    private $balance;

    /**
     * @ORM\Column(type="integer", length=100, unique=false, nullable=false)
     */
    private $interestDraft;

    /**
     * @ORM\Column(type="integer", length=100, unique=false, nullable=false)
     */
    private $overdraft;

    /**
     * @ORM\Column(type="integer", unique=false, nullable=false)
     */
    private $uid;

    /**
     * @return mixed
     */
    public function getAid()
    {
        return $this->aid;
    }

    /**
     * @param mixed $aid
     */
    public function setAid($aid): void
    {
        $this->aid = $aid;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle): void
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @return mixed
     */
    public function getInterestDraft()
    {
        return $this->interestDraft;
    }

    /**
     * @param mixed $interestDraft
     */
    public function setInterestDraft($interestDraft): void
    {
        $this->interestDraft = $interestDraft;
    }

    /**
     * @return mixed
     */
    public function getOverdraft()
    {
        return $this->overdraft;
    }

    /**
     * @param mixed $overdraft
     */
    public function setOverdraft($overdraft): void
    {
        $this->overdraft = $overdraft;
    }

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     */
    public function setUid($uid): void
    {
        $this->uid = $uid;
    }

}
