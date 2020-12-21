<?php
namespace App\Controllers;
trait dd {
  public function dd($value) {
    die(var_dump($value));
  }
}