<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\book;

class basket extends Model {

    public function __construct() {
        $this->book = new book();
    }

    public function file() {
        $book = array();
        $total = 0;
        if (($handle = fopen('C:\xampp\htdocs\bookstore\basket.csv', 'r')) !== false) {
            while ($line = fgetcsv($handle, 1000, ',')) {
                $this->book->setAuthors(explode("|", $line[4]));
                $this->book->setType($line[0]);
                switch ($this->book->getType()) {
                    case 'NewBook':
                    case 'UsedBook':
                    case 'ExclusiveBook':
                        $book[] = [
                            'title' => $line[1],
                            'price' => number_format($line[3], 2, '.', '.') . '/' . number_format($this->book->discount_book($line[3], $line[0]), 2, '.', '.'),
                            'authors' => (count($this->book->getAuthors()) >= 2) ? $this->book->getAuthors()[0] . "," . $this->book->getAuthors()[1] : $this->book->getAuthors()[0],
                            $total += number_format($this->book->discount_book($line[3], $line[0]), 2, '.', '.')
                        ];
                }
            }
        }
        return $book;
    }

    public function check_basket($dados) {
        $book = array();
        if (($handle = fopen('C:\xampp\htdocs\bookstore\basket.csv', 'r')) !== false) {
            while ($line = fgetcsv($handle, 100, ',')) {
                $this->book->setAuthors(explode("|", $line[4]));
                ($dados == $this->book->getAuthors()[0]) ?
                                $book[] = [
                            'title' => $line[1],
                            'price' => number_format($line[3], 2, '.', '.') . '/' . number_format($this->book->discount_book($line[3], $line[0]), 2, '.', '.'),
                            'authors' => (count($this->book->getAuthors()) >= 2) ? $this->book->getAuthors()[0] . ", " . $this->book->getAuthors()[1] : $this->book->getAuthors()[0],
                                ] : 'Não encontrado';
            }
        }
        return $book;
    }

}
