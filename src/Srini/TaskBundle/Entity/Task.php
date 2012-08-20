<?php

namespace Srini\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * @ORM\Entity
 * @ORM\Table(name="task")
 */
class Task {
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
    protected $task;
    
       /**
    * @ORM\Column(type="date")
    */
    protected $dueDate;

    public function getId(){
        $this->id;
    }

    public function setId($id){
        $this->id =$id;
    }

    public function getTask() {
        return $this->task;
    }

    public function setTask($task) {
        $this->task = $task;
    }

    public function getDueDate() {
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $dueDate = null) {
        $this->dueDate = $dueDate;
    }

}