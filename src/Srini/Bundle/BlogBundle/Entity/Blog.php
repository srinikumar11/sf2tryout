<?php

namespace Srini\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Srini\Bundle\BlogBundle\Entity\Blog
 */
class Blog
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var string $blog
     */
    private $blog;

    /**
     * @var boolean $published
     */
    private $published;


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
     * @return Blog
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
     * Set blog
     *
     * @param string $blog
     * @return Blog
     */
    public function setBlog($blog)
    {
        $this->blog = $blog;
    
        return $this;
    }

    /**
     * Get blog
     *
     * @return string 
     */
    public function getBlog()
    {
        return $this->blog;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return Blog
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
     * @var \DateTime $created_at
     */
    private $created_at;

    /**
     * @var \DateTime $updated_at
     */
    private $updated_at;


    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Blog
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Blog
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    /**
     * @var Srini\Bundle\BlogBundle\Entity\Category
     */
    private $category;


    /**
     * Set category
     *
     * @param Srini\Bundle\BlogBundle\Entity\Category $category
     * @return Blog
     */
    public function setCategory(\Srini\Bundle\BlogBundle\Entity\Category $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return Srini\Bundle\BlogBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $comments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add comments
     *
     * @param Srini\Bundle\BlogBundle\Entity\Comment $comments
     * @return Blog
     */
    public function addComment(\Srini\Bundle\BlogBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param Srini\Bundle\BlogBundle\Entity\Comment $comments
     */
    public function removeComment(\Srini\Bundle\BlogBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
    
    public function __toString(){
        return $this->getTitle();
    }
    /**
     * @var string $author
     */
    private $author;

    /**
     * @var string $slug
     */
    private $slug;


    /**
     * Set author
     *
     * @param string $author
     * @return Blog
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Blog
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}