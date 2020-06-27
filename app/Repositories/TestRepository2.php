<?php 
namespace App\Repositories;
use GuzzleHttp\Client;
class TestRepository2 implements TestInterface 
{

    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }
  
    public function get($id)
    {

        $res = $this->client->request('GET', 'http://localhost:3000/contacts/'.$id);

        return json_decode($res->getBody());   
    }

    
    public function all()
    
    {
        
        $res = $this->client->request('GET', 'http://localhost:3000/contacts');

        return json_decode($res->getBody());   


    }

    public function store(array $data){

        unset($data['_token']);
  
        return $this->client->request('POST', 'http://localhost:3000/contacts',[

            'body' => json_encode($data),
    
            'headers' => [
                'content-type'     => 'application/json',
               ]    
            ]
        );
   
        

    }

    public function update($id, array $data)


    {   
 
        $remove = ['_token', '_method'];

        $data = array_diff_key($data, array_flip($remove));
        
  
        return $this->client->request('PUT', 'http://localhost:3000/contacts/'.$id,[

            'body' => json_encode($data),
    
            'headers' => [
                'content-type'     => 'application/json',
               ]    
            ]
        );

        
    }


    public function delete($id)
    {
        $res = $this->client->request('DELETE', 'http://localhost:3000/contacts/'.$id);

        return json_decode($res->getBody());   
        
    }

  
    
}
