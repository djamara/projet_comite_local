<?php

  $db = "";

  function getConnexion(){
      try {
          global $db;
          $db = new PDO('mysql:host=localhost; dbname=croixrouge2021', 'root', '',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
          return $db;
      }
      catch(exception $e) {
          die('Erreur '.$e->getMessage());
      }
  }

  $db = getConnexion();

  function getAllTable($table){

      global $db;
      $req = "select * from ".$table;
      $sth = $db->prepare($req);
      $sth->execute();
      $rep = $sth->fetchAll();
      return $rep;
  }
  function csrftoken(){


  }
