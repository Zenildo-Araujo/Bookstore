<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model {

    private $type;
    private $title;
    private $isbn;
    private $author = array();
    private $price = 0;

    function getType() {
        return $this->type;
    }

    function getTitle() {
        return $this->title;
    }

    function getIsbn() {
        return $this->isbn;
    }

    function getAuthor() {
        return $this->author;
    }

    function getPrice() {
        return $this->price;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    function setPrice($price) {
        $this->price = $price;
    }

}
