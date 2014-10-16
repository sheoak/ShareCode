<?php

class URI
{
   var $uri;
   var $segments = array();

   function __construct()
   {
      $this->uri = $_SERVER['REQUEST_URI'];
      $this->segments = explode('/', $this->uri);
   }

   function getSegment($id, $default=false)
   {
      $id = (int)($id - 1); // if you type 1 then it needs to be 0 as arrays are zerobased
      return isset($this->segments[$id]) ? $this->segments[$id] : $default;
   }
}