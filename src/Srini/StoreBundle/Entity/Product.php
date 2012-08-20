<?php
namespace Srini\StoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//./symfony doctrine:generate:entity --entity="SriniStoreBundle:Product" --fields="name:string(255) price:float description:text"
/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product{
    /**
* @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
* @ORM\JoinColumn(name="category_id", referencedColumnName="id")
*/
protected $category;

   /**
    *
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */ 
   protected $id;
   
   /**
    * @ORM\Column(type="string", length=100)
    */
    protected $name;
    
   /**
    * @ORM\Column(type="text")
    */
    protected $description;
    
   /**
    * @ORM\Column(type="decimal", scale=2)
    */
    protected $price;

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
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param decimal $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return decimal 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set category
     *
     * @param Srini\StoreBundle\Entity\Category $category
     */
    public function setCategory(\Srini\StoreBundle\Entity\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return Srini\StoreBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}