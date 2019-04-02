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
                switch ($line[0]) {
                    case 'NewBook':
                    case 'UsedBook':
                    case 'ExclusiveBook':
                        $book[] = [
                            'title' => $line[1],
                            'price' => number_format($line[3], 2, '.', '.') . '/' . number_format($this->book->discount_book($line[3], $line[0]), 2, '.', '.'),
                            'authors' => (count($this->book->getAuthors()) >= 2) ? $this->book->getAuthors()[0] . "," . $this->book->getAuthors()[1] : $this->book->getAuthors()[0],
                            $total += number_format($this->book->discount_book($line[3], $this->book->getType()), 2, '.', '.')
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
                (strtolower($dados) == strtolower($this->book->getAuthors()[0])) ?
                                $book[] = [
                            'title' => $line[1],
                            'price' => number_format($line[3], 2, '.', '.') . '/' . number_format($this->book->discount_book($line[3], $line[0]), 2, '.', '.'),
                            'authors' => (count($this->book->getAuthors()) >= 2) ? $this->book->getAuthors()[0] . ", " . $this->book->getAuthors()[1] : $this->book->getAuthors()[0],
                                ] : 'Não encontrado';
            }
        }
        return $book;
    }

    public function check_basket_repeat() {
        $book = array();
        $isbn = array();
        $total = 0;
        if (($handle = fopen('C:\xampp\htdocs\bookstore\basket.csv', 'r')) !== false) {
            while ($line = fgetcsv($handle, 100, ',')) {
                $isbn[] = $line;
                $this->book->setAuthors(explode("|", $line[4]));
                $book[] = [
                    'title' => $line[1],
                    'isbn' => $line[2],
                    'price' => number_format($this->book->discount_book($line[3], $line[0]), 2, '.', '.'),
                    'authors' => (count($this->book->getAuthors()) >= 2) ? $this->book->getAuthors()[0] . ", " . $this->book->getAuthors()[1] : $this->book->getAuthors()[0],
                    'total' => $total +=number_format($this->book->discount_book($line[3], $line[0]), 2, '.', '.'),
                ];
            }
        }
        $repeat = array_count_values(array_column($book, 'isbn'));
    }

    public function add_book_csv($dados) {
        $title = $dados['title'];
        $author = $dados['author'];
        $isbn = $dados['isbn'];
        $price = $dados['price'];
        $type = $dados['type'];
        $FileHandle = fopen('C:\xampp\htdocs\bookstore\basket.csv', 'a');
        fwrite($FileHandle, "$type,$title,$isbn,$price,$author");
        fclose($FileHandle);
    }

}
