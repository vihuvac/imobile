<?php

namespace iMobile\Bundle\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Post
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;


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
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Cast to string
     *
     * @return string
     */
    public function __toString()
    {
        return "{$this->title}";
    }

    /**
     * @var string $content
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;
 
    /**
     * @var User $author
     *
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $author;

    /**
     * @var Media $picture
     *
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"all"})
     */
    private $picture;

    /**
     * @var Media $file
     *
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"all"})
     */
    private $file;
 
    /**
     * @var Post $similarPost
     *
     * @ORM\ManyToMany(targetEntity="Post")
     * @ORM\JoinTable(name="similar_post",
     *      joinColumns={@ORM\JoinColumn(name="id_post", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_similar_post", referencedColumnName="id")}
     * )
     */
    private $similarPost;
 
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $creationDate;
 
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modificationDate;
 
    /**
     * @var boolean $published
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published;

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->creationDate = $this->modificationDate = new \DateTime('now');
    }
 
    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->modificationDate = new \DateTime('now');
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->similarPost = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set content
     *
     * @param string $content
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Post
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    
        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set modificationDate
     *
     * @param \DateTime $modificationDate
     * @return Post
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

    /**
     * Set published
     *
     * @param boolean $published
     * @return Post
     */
    public function setPublished($published)
    {
        $this->published = $published;
    
        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set author
     *
     * @param \iMobile\Bundle\DataBundle\Entity\User $author
     * @return Post
     */
    public function setAuthor(\iMobile\Bundle\DataBundle\Entity\User $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \iMobile\Bundle\DataBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Add similarPost
     *
     * @param \iMobile\Bundle\DataBundle\Entity\Post $similarPost
     * @return Post
     */
    public function addSimilarPost(\iMobile\Bundle\DataBundle\Entity\Post $similarPost)
    {
        $this->similarPost[] = $similarPost;
    
        return $this;
    }

    /**
     * Remove similarPost
     *
     * @param \iMobile\Bundle\DataBundle\Entity\Post $similarPost
     */
    public function removeSimilarPost(\iMobile\Bundle\DataBundle\Entity\Post $similarPost)
    {
        $this->similarPost->removeElement($similarPost);
    }

    /**
     * Get similarPost
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSimilarPost()
    {
        return $this->similarPost;
    }

    /**
     * Set picture
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $picture
     * @return Post
     */
    public function setPicture(\Application\Sonata\MediaBundle\Entity\Media $picture = null)
    {
        $this->picture = $picture;
    
        return $this;
    }

    /**
     * Get picture
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set file
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $file
     * @return Post
     */
    public function setFile(\Application\Sonata\MediaBundle\Entity\Media $file = null)
    {
        $this->file = $file;
    
        return $this;
    }

    /**
     * Get file
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getFile()
    {
        return $this->file;
    }
}