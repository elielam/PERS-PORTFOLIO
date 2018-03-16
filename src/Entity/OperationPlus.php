<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="APP_OPERATIONS_PLUS")
 * @ORM\Entity(repositoryClass="App\Repository\OperationPlusRepository")
 */
class OperationPlus implements \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=false, nullable=false)
     */
    private $libelle;

    /**
     * @Assert\DateTime()
     * @ORM\Column(type="datetime", unique=false, nullable=false)
     */
    private $datetime;

    /**
     * @ORM\Column(type="integer", unique=false, nullable=false)
     */
    private $sum;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account", inversedBy="operationsPlus")
     * @ORM\JoinColumn(nullable=true, unique=false, referencedColumnName="id")
     */
    private $account;

    /**
     * @ORM\Column(type="boolean", unique=false, nullable=false)
     */
    private $isCredit;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
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
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param mixed $datetime
     */
    public function setDatetime($datetime): void
    {
        $this->datetime = $datetime;
    }

    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param mixed $sum
     */
    public function setSum($sum): void
    {
        $this->sum = $sum;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param mixed $account
     */
    public function setAccount($account): void
    {
        $this->account = $account;
    }

    /**
     * @return mixed
     */
    public function getIsCredit()
    {
        return $this->isCredit;
    }

    /**
     * @param mixed $isCredit
     */
    public function setIsCredit($isCredit): void
    {
        $this->isCredit = $isCredit;
    }

    public function serialize()
    {

    }

    public function unserialize($serialized)
    {

    }
}
