<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Syndicat", mappedBy="user")
     */
    private $syndicats;

    /**
     * @ORM\OneToMany(targetEntity="Worker", mappedBy="user")
     */
    private $workers;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=128)
     */
    private $login;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

    }


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
     * Set login
     *
     * @param string $login
     *
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->syndicats = new \Doctrine\Common\Collections\ArrayCollection();
        $this->workers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add syndicat
     *
     * @param \AppBundle\Entity\Syndicat $syndicat
     *
     * @return User
     */
    public function addSyndicat(\AppBundle\Entity\Syndicat $syndicat)
    {
        $this->syndicats[] = $syndicat;

        return $this;
    }

    /**
     * Remove syndicat
     *
     * @param \AppBundle\Entity\Syndicat $syndicat
     */
    public function removeSyndicat(\AppBundle\Entity\Syndicat $syndicat)
    {
        $this->syndicats->removeElement($syndicat);
    }

    /**
     * Get syndicats
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSyndicats()
    {
        return $this->syndicats;
    }

    /**
     * Add worker
     *
     * @param \AppBundle\Entity\Worker $worker
     *
     * @return User
     */
    public function addWorker(\AppBundle\Entity\Worker $worker)
    {
        $this->workers[] = $worker;

        return $this;
    }

    /**
     * Remove worker
     *
     * @param \AppBundle\Entity\Worker $worker
     */
    public function removeWorker(\AppBundle\Entity\Worker $worker)
    {
        $this->workers->removeElement($worker);
    }

    /**
     * Get workers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWorkers()
    {
        return $this->workers;
    }
}
