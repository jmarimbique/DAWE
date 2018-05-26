<?php
//file1.php
 

class ClassA
{
    private $name = 'John';
    
    function getName()
    {
        return $this->name;
    }
}
 

//file2.php
 
   include ("file1.php");

   class ClassB
   {

     function __construct()
     {
     }

     function callA()
     {
       $classA = new ClassA();
       $name = $classA->getName();
       echo $name;    //Prints John
     }
   }

   $classb = new ClassB();
   $classb->callA();
 