<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\book;

class basket extends Model {

    public function __construct() {
        $this->check = new book();
    }

    public function check_book($type) {
        
    }

}
