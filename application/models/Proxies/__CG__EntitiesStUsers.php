<?php

namespace Proxies\__CG__\Entities;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class StUsers extends \Entities\StUsers implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setName($name)
    {
        $this->__load();
        return parent::setName($name);
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }

    public function setMiddleName($middleName)
    {
        $this->__load();
        return parent::setMiddleName($middleName);
    }

    public function getMiddleName()
    {
        $this->__load();
        return parent::getMiddleName();
    }

    public function setLastName($lastName)
    {
        $this->__load();
        return parent::setLastName($lastName);
    }

    public function getLastName()
    {
        $this->__load();
        return parent::getLastName();
    }

    public function setEmail($email)
    {
        $this->__load();
        return parent::setEmail($email);
    }

    public function getEmail()
    {
        $this->__load();
        return parent::getEmail();
    }

    public function setPassword($password)
    {
        $this->__load();
        return parent::setPassword($password);
    }

    public function getPassword()
    {
        $this->__load();
        return parent::getPassword();
    }

    public function setBirth($birth)
    {
        $this->__load();
        return parent::setBirth($birth);
    }

    public function getBirth()
    {
        $this->__load();
        return parent::getBirth();
    }

    public function setAboutMe($aboutMe)
    {
        $this->__load();
        return parent::setAboutMe($aboutMe);
    }

    public function getAboutMe()
    {
        $this->__load();
        return parent::getAboutMe();
    }

    public function setRegDate($regDate)
    {
        $this->__load();
        return parent::setRegDate($regDate);
    }

    public function getRegDate()
    {
        $this->__load();
        return parent::getRegDate();
    }

    public function setDescription($description)
    {
        $this->__load();
        return parent::setDescription($description);
    }

    public function getDescription()
    {
        $this->__load();
        return parent::getDescription();
    }

    public function setWhat($what)
    {
        $this->__load();
        return parent::setWhat($what);
    }

    public function getWhat()
    {
        $this->__load();
        return parent::getWhat();
    }

    public function setPicture($picture)
    {
        $this->__load();
        return parent::setPicture($picture);
    }

    public function getPicture()
    {
        $this->__load();
        return parent::getPicture();
    }

    public function setIdFacebook($idFacebook)
    {
        $this->__load();
        return parent::setIdFacebook($idFacebook);
    }

    public function getIdFacebook()
    {
        $this->__load();
        return parent::getIdFacebook();
    }

    public function setSex($sex)
    {
        $this->__load();
        return parent::setSex($sex);
    }

    public function getSex()
    {
        $this->__load();
        return parent::getSex();
    }

    public function setConfToken($confToken)
    {
        $this->__load();
        return parent::setConfToken($confToken);
    }

    public function getConfToken()
    {
        $this->__load();
        return parent::getConfToken();
    }

    public function setSkills($skills)
    {
        $this->__load();
        return parent::setSkills($skills);
    }

    public function getSkills()
    {
        $this->__load();
        return parent::getSkills();
    }

    public function setCountryCode(\Entities\StCountries $countryCode = NULL)
    {
        $this->__load();
        return parent::setCountryCode($countryCode);
    }

    public function getCountryCode()
    {
        $this->__load();
        return parent::getCountryCode();
    }

    public function setLocale(\Entities\StLocales $locale = NULL)
    {
        $this->__load();
        return parent::setLocale($locale);
    }

    public function getLocale()
    {
        $this->__load();
        return parent::getLocale();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'name', 'middleName', 'lastName', 'email', 'password', 'birth', 'aboutMe', 'regDate', 'description', 'what', 'picture', 'idFacebook', 'sex', 'confToken', 'skills', 'countryCode', 'locale');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}