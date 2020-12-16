<?php
class Requests{
private $id_user;
private $text;
private $type;
private $allow;


/**
 * Get the value of id_user
 */ 
public function getId_user()
{
return $this->id_user;
}

/**
 * Set the value of id_user
 *
 * @return  self
 */ 
public function setId_user($id_user)
{
$this->id_user = $id_user;

return $this;
}

/**
 * Get the value of text
 */ 
public function getText()
{
return $this->text;
}

/**
 * Set the value of text
 *
 * @return  self
 */ 
public function setText($text)
{
$this->text = $text;

return $this;
}

/**
 * Get the value of type
 */ 
public function getType()
{
return $this->type;
}

/**
 * Set the value of type
 *
 * @return  self
 */ 
public function setType($type)
{
$this->type = $type;

return $this;
}

/**
 * Get the value of allow
 */ 
public function getAllow()
{
return $this->allow;
}

/**
 * Set the value of allow
 *
 * @return  self
 */ 
public function setAllow($allow)
{
$this->allow = $allow;

return $this;
}
}