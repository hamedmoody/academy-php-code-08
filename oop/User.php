<?php
class User{

    public $ID;
    public $username;
    public $password;
    public $status = 'active';
    public $created_at;
    public $updated_at;

    public function __construct( $user_id ){
        
        $row = db_get_row( "SELECT * FROM users WHERE ID = $user_id" );
        
        // $this->ID           = $row['ID'];
        // $this->username     = $row['username'];
        // $this->password     = $row['password'];
        // $this->status       = $row['status'];
        // $this->created_at   = $row['created_at'];
        // $this->updated_at   = $row['updated_at'];

        foreach( $row as $col => $value ){
            $this->{$col} = $value;
        }
        
        
    }

    public function save(){

        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');

        $data = [
            'username'      => $this->username,
            'password'      => $this->hash_password(),
            'status'        => $this->status,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];

        if( $this->ID ){

            unset( $data['created_at'] );
            unset( $data['password'] );

            db_update(
                'users',
                $data,
                ['ID' => $this->ID]
            );

        }else{
            $user_id = db_insert( 
                'users',
                $data
            );
            $this->ID = $user_id;
        }

    }

    private function hash_password(){
        return md5( $this->password . 'akjsdflkajsdlkfjad' );
    }

}