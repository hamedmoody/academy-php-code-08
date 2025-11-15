<?php
class Teacher extends User{

    public function get_status(){
        return $this->status;
    }

    public function get_income(){
        $income = parent::get_income();
        return $income * 1.1;
    }

}