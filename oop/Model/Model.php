<?php
class Model{

    public $table;

    public $data    = [];

    public function __construct( $id = 0 ){
        if( $id ){
            $sql = "SELECT * FROM {$this->table} WHERE ID = $id";
            $row = db_get_row( $sql );
            if( $row ){
                $this->data = $row;
            }
        }
    }

    public function __get( $arg ){
        if( isset( $this->data[$arg] ) ){
            return $this->data[$arg];
        }
        return null;
    }

    public function __set( $key, $val ){
        $this->data[$key] = $val;
    }

    public function save(){
        
        $this->data['created_at']  = date('Y-m-d H:i:s');
        $this->data['updated_at']  = date('Y-m-d H:i:s');
        db_insert( $this->table, $this->data );

    }

}
