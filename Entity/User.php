<?php

namespace Techmaki\FacebookBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Techmaki\FacebookBundle\Entity\Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var bigint $facebookId
     *
     * @ORM\Column(name="facebook_id", type="bigint", nullable=false)
     */
    private $facebookID;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string $firstName
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string $lastName
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var string $link
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @var string $username
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    private $username;

    /**
     * @var bigint $hometownID
     *
     * @ORM\Column(name="hometown_id", type="bigint", nullable=true)
     */
    private $hometownID;

    /**
     * @var string $hometownName
     *
     * @ORM\Column(name="hometown_name", type="string", length=255, nullable=true)
     */
    private $hometownName;

    /**
     * @var bigint $locationID
     *
     * @ORM\Column(name="location_id", type="bigint", nullable=true)
     */
    private $locationID;

    /**
     * @var string $locationName
     *
     * @ORM\Column(name="location_name", type="string", length=255, nullable=true)
     */
    private $locationName;

    /**
     * @var string $gender
     *
     * @ORM\Column(name="gender", type="string", length=255, nullable=true)
     */
    private $gender;

    /**
     * @var string $locale
     *
     * @ORM\Column(name="locale", type="string", length=5, nullable=true)
     */
    private $locale;

    /**
     * @var string $accessToken
     *
     * @ORM\Column(name="access_token", type="string", length=255, nullable=false)
     */
    private $accessToken;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var datetime $updatedAt
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var date $birthday
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;

    /**
     * @var boolean $age
     *
     * @ORM\Column(name="age", type="boolean", nullable=true)
     */
    private $age;

    /**
     * @var datetime $bannedAt
     *
     * @ORM\Column(name="banned_at", type="datetime", nullable=true)
     */
    private $bannedAt;

    /**
     * @var datetime $legitAt
     *
     * @ORM\Column(name="legit_at", type="datetime", nullable=true)
     */
    private $legitAt;

    /**
     * @var string $ipAddress
     *
     * @ORM\Column(name="ip_address", type="string", length=15, nullable=false)
     */
    private $ipAddress;

    /**
     * @var datetime $ipAddressUpdatedAt
     *
     * @ORM\Column(name="ip_address_updated_at", type="datetime", nullable=false)
     */
    private $ipAddressUpdatedAt;

    public function setData($data) {
      $this
        ->setFacebookID(idx($data, 'id'))
        ->setName(idx($data, 'name'))
        ->setFirstName(idx($data, 'first_name'))
        ->setLastName(idx($data, 'last_name'))
        ->setLink(idx($data, 'link'))
        ->setUsername(idx($data, 'thisname'))
        ->setEmail(idx($data, 'email'))
        ->setGender(idx($data, 'gender'))
        ->setLocale(idx($data, 'locale'));

      $hometown = idx($data, 'hometown', array());
      $this
        ->setHometownID(idx($hometown, 'id'))
        ->setHometownName(idx($hometown, 'name'));

      $location = idx($data, 'location', array());
      $this
        ->setLocationID(idx($location, 'id'))
        ->setLocationName(idx($location, 'name'));

      if (idx($data, 'birthday')) {
        $birthday = DateTime::createFromFormat('m/d/Y', $data['birthday']);
        $this
          ->setBirthday($birthday)
          ->setAge(id(new DateTime())->diff($birthday)->y);
      }

      return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * Set facebookID
     *
     * @param bigint $facebookID
     */
    public function setFacebookID($facebookID)
    {
        $this->facebookID = $facebookID;
        return $this;
    }

    /**
     * Get facebookID
     *
     * @return bigint
     */
    public function getFacebookID()
    {
        return $this->facebookID;
    }

    /**
     * Set name
     *
     * @param string $name
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
     * Set firstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set link
     *
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set hometownID
     *
     * @param bigint $hometownID
     */
    public function setHometownID($hometownID)
    {
        $this->hometownID = $hometownID;
        return $this;
    }

    /**
     * Get hometownID
     *
     * @return bigint
     */
    public function getHometownID()
    {
        return $this->hometownID;
    }

    /**
     * Set hometownName
     *
     * @param string $hometownName
     */
    public function setHometownName($hometownName)
    {
        $this->hometownName = $hometownName;
        return $this;
    }

    /**
     * Get hometownName
     *
     * @return string
     */
    public function getHometownName()
    {
        return $this->hometownName;
    }

    /**
     * Set locationID
     *
     * @param bigint $locationID
     */
    public function setLocationID($locationID)
    {
        $this->locationID = $locationID;
        return $this;
    }

    /**
     * Get locationID
     *
     * @return bigint
     */
    public function getLocationID()
    {
        return $this->locationID;
    }

    /**
     * Set locationName
     *
     * @param string $locationName
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
        return $this;
    }

    /**
     * Get locationName
     *
     * @return string
     */
    public function getLocationName()
    {
        return $this->locationName;
    }

    /**
     * Set gender
     *
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set locale
     *
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set accessToken
     *
     * @param string $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * Get accessToken
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->setUpdatedAt($createdAt);
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return datetime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set birthday
     *
     * @param date $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * Get birthday
     *
     * @return date
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set age
     *
     * @param boolean $age
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    /**
     * Get age
     *
     * @return boolean
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set bannedAt
     *
     * @param datetime $bannedAt
     */
    public function setBannedAt($bannedAt)
    {
        $this->bannedAt = $bannedAt;
        return $this;
    }

    /**
     * Get bannedAt
     *
     * @return datetime
     */
    public function getBannedAt()
    {
        return $this->bannedAt;
    }

    /**
     * Set legitAt
     *
     * @param datetime $legitAt
     */
    public function setLegitAt($legitAt)
    {
        $this->legitAt = $legitAt;
        return $this;
    }

    /**
     * Get legitAt
     *
     * @return datetime
     */
    public function getLegitAt()
    {
        return $this->legitAt;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set ipAddressUpdatedAt
     *
     * @param datetime $ipAddressUpdatedAt
     */
    public function setIpAddressUpdatedAt($ipAddressUpdatedAt)
    {
        $this->ipAddressUpdatedAt = $ipAddressUpdatedAt;
        return $this;
    }

    /**
     * Get ipAddressUpdatedAt
     *
     * @return datetime
     */
    public function getIpAddressUpdatedAt()
    {
        return $this->ipAddressUpdatedAt;
    }
}
