<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="APP_MEANSOFPAYMENT")
 * @ORM\Entity(repositoryClass="App\Repository\MeanOfPaymentRepository")
 */
class MeanOfPayment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=100, unique=false, nullable=false)
     */
    private $libelle;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=100, unique=false, nullable=false)
     */
    private $cardType;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="integer", unique=false, nullable=false)
     */
    private $withdrawalBalance;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="integer", unique=false, nullable=false)
     */
    private $paymentBalance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account", inversedBy="meansOfPayment")
     * @ORM\JoinColumn(nullable=true, unique=false, referencedColumnName="id")
     */
    private $account;

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
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * @param mixed $cardType
     */
    public function setCardType($cardType): void
    {
        $this->cardType = $cardType;
    }

    /**
     * @return mixed
     */
    public function getWithdrawalBalance()
    {
        return $this->withdrawalBalance;
    }

    /**
     * @param mixed $withdrawalBalance
     */
    public function setWithdrawalBalance($withdrawalBalance): void
    {
        $this->withdrawalBalance = $withdrawalBalance;
    }

    /**
     * @return mixed
     */
    public function getPaymentBalance()
    {
        return $this->paymentBalance;
    }

    /**
     * @param mixed $paymentBalance
     */
    public function setPaymentBalance($paymentBalance): void
    {
        $this->paymentBalance = $paymentBalance;
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
}
