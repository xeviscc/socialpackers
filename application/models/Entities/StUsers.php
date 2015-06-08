<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * StUsers
 */
class StUsers
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $middleName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var \DateTime
     */
    private $birth;

    /**
     * @var string
     */
    private $aboutMe;

    /**
     * @var \DateTime
     */
    private $regDate;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $what;

    /**
     * @var string
     */
    private $picture;

    /**
     * @var string
     */
    private $idFacebook;

    /**
     * @var string
     */
    private $sex;

    /**
     * @var string
     */
    private $confToken;

    /**
     * @var string
     */
    private $skills;

    /**
     * @var \Entities\StCountries
     */
    private $countryCode;

    /**
     * @var \Entities\StLocales
     */
    private $locale;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return StUsers
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
     * Set middleName
     *
     * @param string $middleName
     * @return StUsers
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    
        return $this;
    }

    /**
     * Get middleName
     *
     * @return string 
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return StUsers
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
     * Set email
     *
     * @param string $email
     * @return StUsers
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
     * Set password
     *
     * @param string $password
     * @return StUsers
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
     * Set birth
     *
     * @param \DateTime $birth
     * @return StUsers
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;
    
        return $this;
    }

    /**
     * Get birth
     *
     * @return \DateTime 
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Set aboutMe
     *
     * @param string $aboutMe
     * @return StUsers
     */
    public function setAboutMe($aboutMe)
    {
        $this->aboutMe = $aboutMe;
    
        return $this;
    }

    /**
     * Get aboutMe
     *
     * @return string 
     */
    public function getAboutMe()
    {
        return $this->aboutMe;
    }

    /**
     * Set regDate
     *
     * @param \DateTime $regDate
     * @return StUsers
     */
    public function setRegDate($regDate)
    {
        $this->regDate = $regDate;
    
        return $this;
    }

    /**
     * Get regDate
     *
     * @return \DateTime 
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return StUsers
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set what
     *
     * @param string $what
     * @return StUsers
     */
    public function setWhat($what)
    {
        $this->what = $what;
    
        return $this;
    }

    /**
     * Get what
     *
     * @return string 
     */
    public function getWhat()
    {
        return $this->what;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return StUsers
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    
        return $this;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set idFacebook
     *
     * @param string $idFacebook
     * @return StUsers
     */
    public function setIdFacebook($idFacebook)
    {
        $this->idFacebook = $idFacebook;
    
        return $this;
    }

    /**
     * Get idFacebook
     *
     * @return string 
     */
    public function getIdFacebook()
    {
        return $this->idFacebook;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return StUsers
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    
        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set confToken
     *
     * @param string $confToken
     * @return StUsers
     */
    public function setConfToken($confToken)
    {
        $this->confToken = $confToken;
    
        return $this;
    }

    /**
     * Get confToken
     *
     * @return string 
     */
    public function getConfToken()
    {
        return $this->confToken;
    }

    /**
     * Set skills
     *
     * @param string $skills
     * @return StUsers
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    
        return $this;
    }

    /**
     * Get skills
     *
     * @return string 
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set countryCode
     *
     * @param \Entities\StCountries $countryCode
     * @return StUsers
     */
    public function setCountryCode(\Entities\StCountries $countryCode = null)
    {
        $this->countryCode = $countryCode;
    
        return $this;
    }

    /**
     * Get countryCode
     *
     * @return \Entities\StCountries 
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set locale
     *
     * @param \Entities\StLocales $locale
     * @return StUsers
     */
    public function setLocale(\Entities\StLocales $locale = null)
    {
        $this->locale = $locale;
    
        return $this;
    }

    /**
     * Get locale
     *
     * @return \Entities\StLocales 
     */
    public function getLocale()
    {
        return $this->locale;
    }
}
