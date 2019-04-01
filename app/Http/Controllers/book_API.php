<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\basket;
use App\book;

class book_API extends Controller {

    public function __construct() {
        $this->basket = new basket();
        $this->book = new book();
    }

    public function all_book() {
        $book = $this->book->open_file();
        return response()->json($book);
    }

    public function Add_book($dados) {
        $title = $dados['title'];
        $author = $dados['author'];
        $isbn = $dados['isbn'];
        $price = $dados['price'];
        $type = $dados['type'];
        $FileHandle = fopen('C:\xampp\htdocs\bookstore\basket.csv', 'a');
        fwrite($FileHandle, "$type,$title,$isbn,$price,$author");
        fclose($FileHandle);

        return response()->json();
    }

}
