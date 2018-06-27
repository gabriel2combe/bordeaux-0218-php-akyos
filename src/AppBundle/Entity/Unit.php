<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Building is divided into several UNITS that are each separately owned, surrounded by common areas
 *
 * @ORM\Table(name="unit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UnitRepository")
 */
class Unit
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Component", mappedBy="unit")
     *
     */
    private $components;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Building", inversedBy="units")
     */
    private $building;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var int
     *
     * @ORM\Column(name="floor", type="integer")
     */
    private $floor;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=128)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=128)
     */
    private $firstName;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="integer")
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numero
     *
     * @param integer $number
     *
     * @return Unit
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set etage
     *
     * @param integer $floor
     *
     * @return Unit
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;

        return $this;
    }

    /**
     * Get etage
     *
     * @return int
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Set nom
     *
     * @param string $lastName
     *
     * @return Unit
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set prenom
     *
     * @param string $firstName
     *
     * @return Unit
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set telephone
     *
     * @param integer $phone
     *
     * @return Unit
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mail
     *
     * @param string $email
     *
     * @return Unit
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set commentaire
     *
     * @param string $comment
     *
     * @return Unit
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->components = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add component
     *
     * @param \AppBundle\Entity\Component $component
     *
     * @return Unit
     */
    public function addComponent(\AppBundle\Entity\Component $component)
    {
        $this->components[] = $component;

        return $this;
    }

    /**
     * Remove component
     *
     * @param \AppBundle\Entity\Component $component
     */
    public function removeComponent(\AppBundle\Entity\Component $component)
    {
        $this->components->removeElement($component);
    }

    /**
     * Get components
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * Set building
     *
     * @param \AppBundle\Entity\Building $building
     *
     * @return Unit
     */
    public function setBuilding(\AppBundle\Entity\Building $building = null)
    {
        $this->building = $building;

        return $this;
    }

    /**
     * Get building
     *
     * @return \AppBundle\Entity\Building
     */
    public function getBuilding()
    {
        return $this->building;
    }
}