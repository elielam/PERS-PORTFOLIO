<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="APP_TODOS")
 * @ORM\Entity(repositoryClass="App\Repository\TodoRepository")
 */
class Todo implements \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", nullable=false)
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=40, unique=false, nullable=false)
     */
    private $libelle;
    /**
     * @ORM\Column(type="string", length=200, unique=false, nullable=true)
     */
    private $description;
    /**
     * @Assert\DateTime()
     * @ORM\Column(type="datetime", length=100, unique=false, nullable=false)
     */
    private $datetime;
    /**
     * @ORM\Column(type="integer", length=2, unique=false, nullable=false)
     */
    private $state;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="todos")
     * @ORM\JoinColumn(nullable=true, unique=false, referencedColumnName="id")
     */
    private $user;

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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
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
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
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
            "description" => $this->description,
            "datetime" => $this->datetime,
            "state" => $this->state
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->libelle,
            $this->description,
            $this->datetime,
            $this->state
            ) = unserialize($serialized);
    }
}