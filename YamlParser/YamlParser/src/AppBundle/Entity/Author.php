<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * @ORM\Entity
 * @ORM\Table(name="author")
 */
class Author implements UserInterface, \Serializable
{
    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=128, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="passwordA", type="string", length=255, nullable=false)
     */
    private $passworda;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=45, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="homepage", type="string", length=128, nullable=true)
     */
    private $homepage;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_author", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idAuthor;



    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Author
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set passworda
     *
     * @param string $passworda
     *
     * @return Author
     */
    public function setPassworda($passworda)
    {
        $this->passworda = $passworda;

        return $this;
    }

    /**
     * Get passworda
     *
     * @return string
     */
    public function getPassworda()
    {
        return $this->passworda;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Author
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return Author
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set homepage
     *
     * @param string $homepage
     *
     * @return Author
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;

        return $this;
    }

    /**
     * Get homepage
     *
     * @return string
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * Get idAuthor
     *
     * @return integer
     */
    public function getIdAuthor()
    {
        return $this->idAuthor;
    }


    public function getPassword()
    {
        return $this->passworda;
    }

    public function getUsername()
    {
        return $this->mail;
    }

    public function getRoles()
    {
        // this must return an array or roles, can be RoleInterface
        return array('ROLE_ADMIN');
    }

    public function getSalt()
    {
        return '';
    }

    public function eraseCredentials()
    {

    }

    public function equals(UserInterface $user)
    {
        return $this->getId() === $user->getId();
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->idAuthor,
            $this->mail,
            $this->passworda,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->idAuthor,
            $this->mail,
            $this->passworda,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }
}
