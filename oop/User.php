<?php
class User{

    public $ID;
    public $username;
    public $password;
    private $status = 'active';
    public $created_at;
    public $updated_at;

    public $phone;
    public $name;

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

    protected function set_password( $pass ){

        db_update(
            'usres',
            [
                'password'  => $this->hash_password( $pass )
            ],
            [
                'ID'        => $this->ID
            ]
        );

    }

    public function send_sms($message){

        $base_url   = 'https://edge.ippanel.com/v1';
        $api_key    = '';

        $send_message_url = $base_url . '/api/send';


        $ch = curl_init(  $send_message_url );

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        curl_setopt( $ch, CURLOPT_HTTPHEADER, [
            'Authorization: ' . $api_key,
            'Content-Type: application/json'
        ]);

        $data = [
            'sending_type'  => 'webservice',
            'from_number'   => '+983000505',
            'message'       => $message,
            'params'        => [
                'recipients'    => [
                    $this->phone
                ]
            ]   
        ];

        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $data ) );

        $result = curl_exec( $ch );

        curl_close($ch);

        $result = json_decode( $result );

        print_r( $result );



    }

    public function save(){

        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');

        $data = [
            'username'      => $this->username,
            'password'      => $this->hash_password( $this->password ),
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

    private function hash_password( $password ){
        return md5( $password . 'akjsdflkajsdlkfjad' );
    }

}