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
        $book = $this->book->open_file();
        $colum = array_count_values(array_column($book, 'isbn'));
        $book1 = array();
        foreach ($colum as $key => $value) {
            $coun = 0;
            $calc = 0;
            for ($i = 0; $i <= count($book) - 1; $i++) {
                if ($key == $book[$i]['isbn'] && $value > 1):
                    $coun++;
                    $calc += $book[$i]['price'];
                    if ($coun > 1) {
                        $book1[] = [
                            'price' => $calc,
                            'isbn' => $book[$i]['isbn'],
                            'title' => $book[$i]['title'],
                            'authors' => $book[$i]['authors'],
                            'qtd' => $value
                        ];
                    }
                endif;
            }
        }
        return $book1;
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

    public function check_choose_file($dados, $file) {
        $book = array();
        if (($handle = fopen("C:\Users\zenil\OneDrive\Ambiente de Trabalho\\$file", "r")) !== false) {
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
        fclose($handle);
        return $book;
    }

}
