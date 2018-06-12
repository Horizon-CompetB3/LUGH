<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjetsRepository")
 */
class Projets
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $type;
    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $entreprise;
    /**
     * @ORM\Column(type="string", unique=true, length=64)
     */
    private $artiste;
    /**
     * @ORM\Column(type="text")
     */
    private $orientation;
    /**
     * @ORM\Column(type="string", length=64)
     */
    private $photos;
    /**
     * @ORM\Column(type="string", unique=true, length=150)
     */
    private $description;
    /**
     * @ORM\Column(type="integer", unique=true)
     */
    private $budget;
    /**
     * @ORM\Column(type="integer", unique=true)
     */
    private $largeur;
    /**
     * @ORM\Column(type="integer")
     */
    private $hauteur;
    /**
     * @ORM\Column(type="integer", unique=true)
     */
    private $profondeur;


    public function getId()
    {
        return $this->id;
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
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * @param mixed $entreprise
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
    }

    /**
     * @return mixed
     */
    public function getArtiste()
    {
        return $this->artiste;
    }

    /**
     * @param mixed $artiste
     */
    public function setArtiste($artiste)
    {
        $this->artiste = $artiste;
    }

    /**
     * @return mixed
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * @param mixed $orientation
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;
    }

    /**
     * @return mixed
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param mixed $photos
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;
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
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param mixed $budget
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
    }

    /**
     * @return mixed
     */
    public function getLargeur()
    {
        return $this->largeur;
    }

    /**
     * @param mixed $largeur
     */
    public function setLargeur($largeur)
    {
        $this->largeur = $largeur;
    }

    /**
     * @return mixed
     */
    public function getHauteur()
    {
        return $this->hauteur;
    }

    /**
     * @param mixed $hauteur
     */
    public function setHauteur($hauteur)
    {
        $this->hauteur = $hauteur;
    }

    /**
     * @return mixed
     */
    public function getProfondeur()
    {
        return $this->profondeur;
    }

    /**
     * @param mixed $profondeur
     */
    public function setProfondeur($profondeur)
    {
        $this->profondeur = $profondeur;
    }


}
