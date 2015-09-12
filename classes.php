<?php
   class User {
      var $id;
      var $email;
      function User($id, $email){
         $this->id = $id;
         $this->email = $email;
      }
   }
   class  Lawyer extends User{
      /* Member variables */    
      var $mobile;  
      var $quikrid;
      var $address;
      var $subcategory_id;
      var $specialization;
      var $council_id;
      var $verified;
      var $ratings;

      //member functions
      function Lawyer( $id, $email, $mobile , $quikrid, $address, $subcategory_id, $specialization, $council_id, $verified, $ratings){
         User::User($id,$email);
         $this->mobile = $mobile;
         $this->quikrid = $quikrid;
         $this->address = $address;
         $this->subcategory_id = $subcategory_id;
         $this->specialization = $specialization;
         $this->council_id = $council_id;
         $this->verified = $verified;
         $this->ratings = $ratings;
      }
   }

   class Customer extends User{
      var $mobile;
      function Customer($id,$email,$mobile){
         User::User($id,$email);
         $this->mobile = $mobile;
      }
   }

   class Article {
      var $id;
      var $date_of_posting;
      var $author_id;
      var $title;
      var $content;
      var $upvotes;
      var $downvotes;

      function Article($id, $date_of_posting, $author_id, $title, $content, $upvotes, $downvotes){
         $this->id = $id;
         $this->date_of_posting = $date_of_posting;
         $this->author_id = $author_id;
         $this->title = $title;
         $this->content = $content;
         $this->upvotes = $upvotes;
         $this->downvotes = $downvotes;
      }
   }

   class Case {
      var $id;
      var $title;
      var $description;
      var $subcategory_id;
      var $closed;
      var $date_of_posting;

      function Case($id, $title, $description, $subcategory_id,$date_of_posting, $closed){
         $this->id = $id;
         $this->title = $title;
         $this->description = $description;
         $this->subcategory_id = $subcategory_id;
         $this->date_of_posting = $date_of_posting;
         $this->closed = $closed;
      }
   }
?>