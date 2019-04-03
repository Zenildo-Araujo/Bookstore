<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model {

    private $type;
    private $title;
    private $isbn;
    private $authors = array();
    private $price;

    function getIsbn() {
        return $this->isbn;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    function getType() {
        return $this->type;
    }

    function setType($type) {
        $this->type = $type;
    }

    function getAuthors() {
        return $this->authors;
    }

    function setAuthors($authors) {
        $this->authors = $authors;
    }

    public function open_file() {
        if (($handle = fopen('C:\xampp\htdocs\bookstore\basket.csv', 'r')) !== false) {
            $book = array();
            $total = 0;
            while ($line = fgetcsv($handle, 100, ',')) {
                $this->setAuthors(explode("|", $line[4]));
                switch ($line[0]) {
                    case 'NewBook':
                    case 'UsedBook':
                    case 'ExclusiveBook':
                        $book[] = [
                            'type' => $line[0],
                            'title' => $line[1],
                            'isbn' => $line[2],
                            'price' => number_format($this->discount_book($line[3], $line[0]), 2, '.', '.'),
                            'authors' => (count($this->getAuthors()) >= 2) ? $this->getAuthors()[0] . "," . $this->getAuthors()[1] : $this->getAuthors()[0],
                            $total += number_format($this->discount_book($line[3], $line[0]), 2, '.', '.')
                        ];
                }
            }
        }

        return $book;
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

    public function discount_book($value, $type) {
        switch ($type) {
            case 'NewBook':
                return $value -= ($value * 0.10);
            case 'UsedBook':
                return $value -= ($value * 0.25);
            case 'ExclusiveBook':
                return $value;
            default :
                return false;
        }
    }

    public function count_authors() {
        $author = array();
        $count = 0;
        $row = 0;
        if (($handle = fopen('C:\xampp\htdocs\bookstore\basket.csv', 'r')) !== false) {
            while ($line = fgetcsv($handle, 1000, ',')) {
                $author[$count] = explode("|", $line[4]);
            }
            fclose($handle);
        }
        return --$row;
    }

}
