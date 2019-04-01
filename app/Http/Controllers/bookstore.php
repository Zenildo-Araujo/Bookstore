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
        $type = $request->input('search');
        switch ($type) {
            case '-displayauthors':
                $book = $this->basket->file();
                return view('display_authors', ['book' => $book, 'lines' => $this->count_regist()]);
            default:
                $book = $this->basket->check_basket($type);
                return view('display_authors', ['book' => $book, 'lines' => $this->count_regist()]);
        }
    }

}
