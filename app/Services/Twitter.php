<?php
namespace App\Services;

class Twitter
{
  protected $apiKey;

  public function __construct($apiKey = 'aaa')
  {
    $this->apiKey = $apiKey;
  }

  
}
