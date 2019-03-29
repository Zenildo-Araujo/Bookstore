<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;
use App\basket;

class bookstore extends Controller {

    public function __construct() {
        $this->book = new book();
        $this->basket = new basket();
    }

    public function index() {
        $book = $this->book->open_file();
        return view('home', ['book' => $book, 'total' => $book[5]['0'], 'lines' => $this->count_regist()]);
    }

    public function count_regist() {
        $lines = $this->book->number_regist();
        return $lines--;
    }

    public function count_authors() {
        $lines = $this->book->number_authors();
        return $lines--;
    }

    public function result_check(Request $request) {
        //$author = $request->input('author');
        //$file = $request->input('file');
        $type = $request->input('search');
        //$book = $this->basket->check_book($type);

        $handle = $this->book->open_file();

        $book = $this->book->file($type, $handle);
        fclose($handle);
        return view('display_authors', ['book' => $book, 'lines' => $this->count_regist()]);
    }

}
