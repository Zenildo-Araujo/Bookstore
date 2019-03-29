<?php

namespace App\Http\Controllers;

use App\book;

class bookstore extends Controller {

    public function __construct() {
        $this->book = new book();
    }

    public function index() {
        $book = array();
        $count = 0;
        $author = array();
        $total = 0;
        $data = $this->book->open_file();
        while ($line = fgetcsv($data, 100, ',')) {
            $author[$count] = explode("|", $line[4]);
            switch ($line[0]) {
                case 'NewBook':
                case 'UsedBook':
                case 'ExclusiveBook':
                    $book[] = [
                        'type' => $line[0],
                        'title' => $line[1],
                        'isbn' => $line[2],
                        'price' => number_format($line[3], 2, '.', '.'),
                        'authors' => (count($author[$count]) >= 2) ? $author[$count][0] . "," . $author[$count][1] : $author[$count][0],
                        $total += number_format($line[3], 2, '.', '.')
                    ];
            }
            $count++;
        }
        //dd($book);
        fclose($data);
        return view('home', ['book' => $book, 'total' => $total]);
    }

    public function count_regist() {
        $row = $this->book->number_regist();
        return view('welcome', ['count' => $row]);
    }

    public function result_check(Request $request) {
        $author = $request->input('author');
        $file = $request->input('file');
        $book = $this->basket->check_basket($author, $file);
        return view('result_check', ['book' => $book]);
    }

}
