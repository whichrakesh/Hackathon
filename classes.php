<?php
   class User {
      var $id;
      var $name;
      var $email;
      var $mobile;
      var $quikrid;
      var $address;
      var $photo_url;
      function User($id, $name, $email,$mobile,$quikrid,$address,$photo_url){
         $this->id = $id;
         $this->name = $name;
         $this->email = $email;
         $this->mobile = $mobile;
         $this->quikrid = $quikrid;
         $this->address = $address;
         $this->photo_url = $photo_url;
      }
   }
   class  Lawyer extends User{
      /* Member variables */    
      var $specialization;
      var $experience;
      var $council_id;
      var $verified;
      var $ratings;
      var $city;
      var $locality;
      //member functions

      function Lawyer( $id, $name, $email, $mobile , $quikrid, $address, 
         $specialization, $experience, $council_id, $verified, $ratings , $photo_url, $city, $locality){
         User::User($id,$name, $email,$mobile,$quikrid,$address,$photo_url);         
         $this->specialization = $specialization;
         $this->council_id = $council_id;
         $this->experience = $experience;
         $this->verified = $verified;
         $this->ratings = $ratings;
         $this->city = $city;
         $this->locality = $locality;
      }
   }

   class Customer extends User{
      function Customer($id, $name, $email,$mobile,$quikrid,$address,$photo_url){
         User::User($id, $name, $email,$mobile,$quikrid,$address,$photo_url);         
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

   class LegalCase{
      var $id;
      var $title;
      var $subcategory_id;
      var $status;
      var $date_of_posting;
      var $customer_id;
      var $lawyer_id;

      function LegalCase($id, $title, $subcategory_id, $date_of_posting, $status, $customer_id, $lawyer_id){
         $this->id = $id;
         $this->title = $title;
         $this->subcategory_id = $subcategory_id;
         $this->date_of_posting = $date_of_posting;
         $this->status = $status;
         $this->customer_id = $customer_id;
         $this->lawyer_id = $lawyer_id;
      }
   }

   class Message{
      var $id;
      var $case_id;
      var $content;
      var $sender_id;
      var $timestamp;

      function Message($id, $case_id, $sender_id,$content,  $timestamp){
         $this->id = $id;
         $this->case_id = $case_id;
         $this->content = $content;
         $this->sender_id = $sender_id;
         $this->timestamp = $timestamp;
      }
   }
?>