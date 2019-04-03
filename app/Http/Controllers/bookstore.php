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
        $n = $this->book->number_regist();
        return view('home', ['book' => $book, 'total' => $book[--$n]['0'], 'lines' => $this->count_regist()]);
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

    public function Add_book(Request $request) {
        $dados = array(
            'isbn' => $request->input('isbn'),
            'price' => $request->input('price'),
            'author' => $request->input('author'),
            'type' => $request->input('type'),
            'title' => $request->input('title')
        );
        $this->basket->add_book_csv($dados);
        //dd($dados);
        return redirect('/');
    }

    public function result_check_repeat() {
        $book = $this->basket->check_basket_repeat();
        return view('agreg_produt', ['book' => $book, 'lines' => $this->count_regist()]);
    }

    public function add() {
        return view('form_add', ['lines' => $this->count_regist()]);
    }

    public function choose_file(Request $request) {
        $author = $request->input('author');
        $file = $request->input('file');
        $book = $this->basket->check_choose_file($author, $file);
        return view('display_authors', ['book' => $book, 'lines' => $this->count_regist()]);
    }

}
