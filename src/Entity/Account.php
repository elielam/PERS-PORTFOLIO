<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity="OperationPlus", indexBy="aid", mappedBy="account")
     * @ORM\JoinColumn(name="operationsPlus", referencedColumnName="id")
     */
    private $operationsPlus;

    /**
     * @ORM\OneToMany(targetEntity="OperationMinus", indexBy="account", mappedBy="account")
     * @ORM\JoinColumn(name="operationsMinus", referencedColumnName="id")
     */
    private $operationsMinus;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="user")
     * @ORM\JoinColumn(nullable=true, unique=false, referencedColumnName="uid")
     */
    private $uid;

    public function __construct()
    {
        $this->operationsPlus = new ArrayCollection();
        $this->operationsMinus = new ArrayCollection();
    }

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
     * @return Collection|OperationPlus[]
     */
    public function getOperationsPlus()
    {
        return $this->operationsPlus;
    }

    /**
     * @param mixed $operationsPlus
     */
    public function setOperationsPlus($operationsPlus): void
    {
        $this->operationsPlus = $operationsPlus;
    }

    /**
     * @return Collection|OperationMinus[]
     */
    public function getOperationsMinus()
    {
        return $this->operationsMinus;
    }

    /**
     * @param mixed $operationsMinus
     */
    public function setOperationsMinus($operationsMinus): void
    {
        $this->operationsMinus = $operationsMinus;
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