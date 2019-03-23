<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Memes
 *
 * @ORM\Table(name="memes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MemesRepository")
 */
class Memes
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="text")
     */
    private $color;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\MediaComposition")
     */
    private $composition;

    /**
     * @var float
     *
     * @ORM\Column(name="raiting", type="float")
     */
    private $raiting;

//    /**
//     * @var string
//     *
//     * @ORM\Column(name="lang", type="string", length=255,columnDefinition="ENUM('en','ru')")
//     */
//    private $lang;

    /**
     * @ORM\Column(type="gender",options={"enumValues":{"en","ru"}})
     */
    private $lang;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modification_date", type="datetime")
     */
    private $modificationDate;

    public function __construct()
    {
        $this->modificationDate = new \DateTime();
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
     * Set name
     *
     * @param string $name
     *
     * @return Memes
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
     * Set description
     *
     * @param string $description
     *
     * @return Memes
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
     * Set color
     *
     * @param string $color
     *
     * @return Memes
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set compositionOd
     *
     * @param integer $composition
     *
     * @return Memes
     */
    public function setCompositionOd($composition)
    {
        $this->composition = $composition;

        return $this;
    }

    /**
     * Get compositionOd
     *
     * @return int
     */
    public function getCompositionOd()
    {
        return $this->composition;
    }

    /**
     * Set raiting
     *
     * @param float $raiting
     *
     * @return Memes
     */
    public function setRaiting($raiting)
    {
        $this->raiting = $raiting;

        return $this;
    }

    /**
     * Get raiting
     *
     * @return float
     */
    public function getRaiting()
    {
        return $this->raiting;
    }

//    /**
//     * Set lang
//     *
//     * @param string $lang
//     *
//     * @return Memes
//     */
//    public function setLang($lang)
//    {
//        $this->lang = $lang;
//
//        return $this;
//    }
    public function setLang($lang)
    {
        if (!in_array($lang, array(self::STATUS_RU, self::STATUS_EN))) {
            throw new \InvalidArgumentException("Invalid status");
        }
        $this->lang = $lang;
    }

    /**
     * Get lang
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set modificationDate
     *
     * @param \DateTime $modificationDate
     *
     * @return Memes
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;

        return $this;
    }

    /**
     * Get modificationDate
     *
     * @return \DateTime
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }
}

