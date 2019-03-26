<?php

namespace App\Http\Controllers;

use App\book;

class bookstore extends Controller {

    public function __construct() {
        $this->book = new book();
    }

    public function index() {
        $book = array();
        $i = 1;
        $data = $this->book->open_file();
        $file = $this->book->write_file($data);
        while (!empty($file[$i])) {
            switch ($file[1]['type']) {
                case 'NewBook':
                case 'UsedBook':
                case 'ExclusiveBook':
                    $book[$i] = $file[$i];
                //dd($file[$i]);
            }
            ++$i;
        }

        fclose($data);
        return view('home', ['book' => $book]);
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
