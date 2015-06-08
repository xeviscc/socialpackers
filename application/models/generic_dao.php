<?php
// Declare the interface 'GenericDAO'
interface GenericDAO
{
    public function save($item);
    public function update($item);
    public function findById($id);
    public function remove($item);
    public function findAll();
}
?>