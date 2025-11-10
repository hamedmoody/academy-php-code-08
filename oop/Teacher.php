<?php
class Teacher extends User{

    public $income;

    public function get_income(){
        return $this->income;
    }

    public function get_status(){
        return $this->status;
    }

}