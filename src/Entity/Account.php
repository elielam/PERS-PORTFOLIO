<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
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
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=40, unique=false, nullable=false)
     */
    private $libelle;
    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=11, unique=true, nullable=false)
     */
    private $bic;
    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=34, unique=true, nullable=false)
     */
    private $iban;
    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="integer", length=100, unique=false, nullable=false)
     */
    private $balance;
    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="integer", length=100, unique=false, nullable=false)
     */
    private $atFirstBalance;
    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="integer", length=100, unique=false, nullable=false)
     */
    private $interestDraft;
    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="integer", length=100, unique=false, nullable=false)
     */
    private $overdraft;

    /**
     * @ORM\OneToMany(targetEntity="MeanOfPayment", indexBy="account", mappedBy="account", orphanRemoval=true, cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumn(name="operationsPlus", referencedColumnName="id")
     */
    private $meansOfPayment;

    /**
     * @ORM\OneToMany(targetEntity="OperationPlus", indexBy="account", mappedBy="account", orphanRemoval=true, cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumn(name="operationsPlus", referencedColumnName="id")
     */
    private $operationsPlus;

    /**
     * @ORM\OneToMany(targetEntity="OperationMinus", indexBy="account", mappedBy="account", orphanRemoval=true, cascade={"persist"}, fetch="EAGER")
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
        $this->meansOfPayment = new ArrayCollection();
    }

    public function addOperationPlus(OperationPlus $operationPlus)
    {
        if ($this->operationsPlus->contains($operationPlus)) {
            return;
        }

        $this->operationsPlus[] = $operationPlus;
        $operationPlus->setAccount($this);
    }

    public function getOperationPlus($id)
    {
        if($this->getOperationsPlus()) {
            foreach ($this->getOperationsPlus() as $operationPlus) {
                if($operationPlus->getId() === $id){
                    return $operationPlus;
                }
            }
        } else {
            return;
        }
    }

    public function removeOperationPlus(OperationPlus $operationPlus)
    {
        $this->operationsPlus->removeElement($operationPlus);
        // set the owning side to null
        $operationPlus->setAccount(null);
    }

    public function addOperationMinus(OperationMinus $operationMinus)
    {
        if ($this->operationsMinus->contains($operationMinus)) {
            return;
        }

        $this->operationsMinus[] = $operationMinus;
        $operationMinus->setAccount($this);
    }

    public function getOperationMinus($id)
    {
        if($this->getOperationsMinus()) {
            foreach ($this->getOperationsMinus() as $operationMinus) {
                if($operationMinus->getId() === $id){
                    return $operationMinus;
                }
            }
        } else {
            return;
        }
    }

    public function removeOperationMinus(OperationMinus $operationMinus)
    {
        $this->operationsMinus->removeElement($operationMinus);
        // set the owning side to null
        $operationMinus->setAccount(null);
    }

//    public function initBalance() {
//        $tmpBalance = $this->getBalance();
//        foreach ($this->operationsMinus as $opMinus) {
//            if (!$opMinus->getIsDebit()){
//                $tmpBalance -=  $opMinus->getSum();
//                $opMinus->setIsDebit(true);
//            }
//        }
//        foreach ($this->operationsPlus as $opPlus) {
//            if (!$opPlus->getIsCredit()){
//                $tmpBalance +=  $opPlus->getSum();
//                $opPlus->setIsCredit(true);
//            }
//        }
//        $this->setBalance($tmpBalance);
//    }

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
    public function getAtFirstBalance()
    {
        return $this->atFirstBalance;
    }

    /**
     * @param mixed $atFirstBalance
     */
    public function setAtFirstBalance($atFirstBalance): void
    {
        $this->atFirstBalance = $atFirstBalance;
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
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param mixed $bic
     */
    public function setBic($bic): void
    {
        $this->bic = $bic;
    }

    /**
     * @return mixed
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param mixed $iban
     */
    public function setIban($iban): void
    {
        $this->iban = $iban;
    }

    /**
     * @return Collection|MeanOfPayment[]
     */
    public function getMeansOfPayment()
    {
        return $this->meansOfPayment;
    }

    /**
     * @param mixed $meansOfPayment
     */
    public function setMeansOfPayment($meansOfPayment): void
    {
        $this->meansOfPayment = $meansOfPayment;
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
        return array(
            $this->id,
            $this->libelle,
            $this->balance,
            $this->interestDraft,
            $this->overdraft
        );
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->libelle,
            $this->balance,
            $this->interestDraft,
            $this->overdraft
            ) = unserialize($serialized);
    }

}