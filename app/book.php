<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model {

    private $type;
    private $title;
    private $isbn;
    private $author = array();
    private $price;

    function getAuthor() {
        return $this->author;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    public function open_file() {
        if (($handle = fopen('C:\xampp\htdocs\bookstore\basket.csv', 'r')) !== false) {
            $book = array();
            $count = 0;
            $total = 0;
            while ($line = fgetcsv($handle, 100, ',')) {
                $this->setAuthor(explode("|", $line[4]));
                switch ($line[0]) {
                    case 'NewBook':
                    case 'UsedBook':
                    case 'ExclusiveBook':
                        $book[] = [
                            'type' => $line[0],
                            'title' => $line[1],
                            'isbn' => $line[2],
                            'price' => number_format($this->discount_book($line[3], $line[0]), 2, '.', '.'),
                            'authors' => (count($this->getAuthor()) >= 2) ? $this->getAuthor()[0] . "," . $this->getAuthor()[1] : $this->getAuthor()[0],
                            $total += number_format($this->discount_book($line[3], $line[0]), 2, '.', '.')
                        ];
                }
                $count++;
            }
            fclose($handle);
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

    public function file($type, $handle) {
        $book = array();
        $count = 0;
        $total = 0;
        switch ($type) {
            case '-displayauthors':
                while ($line = fgetcsv($handle, 1000, ',')) {
                    $this->setAuthor(explode("|", $line[4]));
                    switch ($line[0]) {
                        case 'NewBook':
                        case 'UsedBook':
                        case 'ExclusiveBook':
                            $book[] = [
                                'title' => $line[1],
                                'price' => number_format($line[3], 2, '.', '.') . '/' . number_format($this->discount_book($line[3], $line[0]), 2, '.', '.'),
                                'authors' => (count($this->getAuthor()) >= 2) ? $this->getAuthor()[0] . "," . $this->getAuthor()[1] : $this->getAuthor()[0],
                                $total += number_format($this->basket->discount_book($line[3], $line[0]), 2, '.', '.')
                            ];
                    }
                    $count++;
                }
                //dd($this->getAuthor());
                return $book;
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
