<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Table(name="APP_ACCOUNTS")
 * @ORM\Entity(repositoryClass="App\Repository\AccountRepository")
 */
class Account implements \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=40, unique=false, nullable=false)
     */
    private $libelle;

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
     * @ORM\OneToMany(targetEntity="OperationPlus", indexBy="aid", mappedBy="account", fetch="EAGER")
     * @ORM\JoinColumn(name="operationsPlus", referencedColumnName="id")
     */
    private $operationsPlus;

    /**
     * @ORM\OneToMany(targetEntity="OperationMinus", indexBy="account", mappedBy="account", fetch="EAGER")
     * @ORM\JoinColumn(name="operationsMinus", referencedColumnName="id")
     */
    private $operationsMinus;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="accounts")
     * @ORM\JoinColumn(nullable=true, unique=false, referencedColumnName="id")
     */
    private $user;

    public function __construct()
    {
        $this->operationsPlus = new ArrayCollection();
        $this->operationsMinus = new ArrayCollection();
    }

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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user = null): void
    {
        $this->user = $user;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            "id" => $this->id,
            "libelle" => $this->libelle,
            "type" => $this->type,
            "balance" => $this->balance,
            "interestedDraft" => $this->interestDraft,
            "overdraft" => $this->overdraft
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->libelle,
            $this->type,
            $this->balance,
            $this->interestDraft,
            $this->overdraft
            ) = unserialize($serialized);
    }
}