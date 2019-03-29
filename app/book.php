<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model {

    private $type;
    private $title;
    private $isbn;
    private $author = array();
    private $price;

    public function open_file() {
        if (($handle = fopen('C:\xampp\htdocs\bookstore\basket.csv', 'r')) !== false) {
            return $handle;
        } else {
            return false;
        }
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

}
