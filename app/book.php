<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model {

    private $type;
    private $title;
    private $isbn;
    private $author = array();
    private $price;

    public function getType() {
        return $this->type;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function open_file() {
        if (($handle = fopen('C:\xampp\htdocs\bookstore\basket.csv', 'r')) !== false) {
            return $handle;
        } else {
            return false;
        }
    }

    //função que faz a contagem dos registros dentro do basket
    public function number_regist() {
        $row = 0;
        if (($handle = fopen('C:\xampp\htdocs\bookstore\basket.csv', 'r')) !== false) {
            while ($line = fgetcsv($handle, 1000, ',')) {
                if (++$row == 0) {
                    continue;
                }
            }
            fclose($handle);
        }
        return --$row;
    }

    public function write_file($data) {
        $book = array();
        while ($line = fgetcsv($data, 100, ',')) {
            $this->setType($line[0]);
            $this->setTitle($line[1]);
            $this->setIsbn($line[2]);
            $this->setPrice($line[3]);
            $this->setAuthor($line[4]);
            $book[] = [
                'type' => $this->getType(),
                'title' => $this->getTitle(),
                'isbn' => $this->getIsbn(),
                'price' => $this->getPrice(),
                'authors' => $this->getAuthor()
            ];
        }
        return $book;
    }

}
