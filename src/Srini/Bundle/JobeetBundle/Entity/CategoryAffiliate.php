<?php

namespace Srini\Bundle\JobeetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Srini\Bundle\JobeetBundle\Entity\CategoryAffiliate
 */
class CategoryAffiliate
{
    /**
     * @var Srini\Bundle\JobeetBundle\Entity\Category
     */
    private $category;

    /**
     * @var Srini\Bundle\JobeetBundle\Entity\Affiliate
     */
    private $affiliate;


    /**
     * Set category
     *
     * @param Srini\Bundle\JobeetBundle\Entity\Category $category
     * @return CategoryAffiliate
     */
    public function setCategory(\Srini\Bundle\JobeetBundle\Entity\Category $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return Srini\Bundle\JobeetBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set affiliate
     *
     * @param Srini\Bundle\JobeetBundle\Entity\Affiliate $affiliate
     * @return CategoryAffiliate
     */
    public function setAffiliate(\Srini\Bundle\JobeetBundle\Entity\Affiliate $affiliate = null)
    {
        $this->affiliate = $affiliate;
    
        return $this;
    }

    /**
     * Get affiliate
     *
     * @return Srini\Bundle\JobeetBundle\Entity\Affiliate 
     */
    public function getAffiliate()
    {
        return $this->affiliate;
    }
    /**
     * @var integer $id
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}