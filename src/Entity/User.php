<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="APP_USERS")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", unique=true, nullable=false)
     */
    private $uid;

    /**
     * @ORM\Column(type="string", length=20, unique=false, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=20, unique=false, nullable=false)
     */
    private $lastname;

    /**
     * @Assert\DateTime()
     * @ORM\Column(type="datetime", unique=false, nullable=false)
     */
    private $birthdate;

    /**
     * @ORM\Column(type="string", length=40, unique=true, nullable=false)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100, unique=false, nullable=false)
     */
    private $password;

    /**
     * @ORM\Column(type="integer", length=500, unique=false, nullable=true)
     */
    private $salt;

    /**
     * @ORM\Column(type="array", unique=false, nullable=false)
     */
    private $roles;

    /**
     * @ORM\Column(type="string", length=40, unique=true, nullable=false)
     */
    private $username;

    /**
     * @ORM\OneToMany(targetEntity="Account", indexBy="user", mappedBy="user")
     * @ORM\JoinColumn(name="account", referencedColumnName="aid")
     */
    private $accounts;

    public function __construct()
    {
        $this->accounts = new ArrayCollection();
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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param mixed $salt
     */
    public function setSalt($salt): void
    {
        $this->salt = $salt;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return array($this->roles);
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return Collection|Account[]
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * @param mixed $accounts
     */
    public function setAccounts($accounts): void
    {
        $this->accounts = $accounts;
    }


    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->uid,
            $this->name,
            $this->lastname,
            $this->email,
            $this->password,
            $this->roles,
            $this->username
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->uid,
            $this->name,
            $this->lastname,
            $this->email,
            $this->password,
            $this->roles,
            $this->username
            ) = unserialize($serialized);
    }

    public function eraseCredentials()
    {
    }

}
