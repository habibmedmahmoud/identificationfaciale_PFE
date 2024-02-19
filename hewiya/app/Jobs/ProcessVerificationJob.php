<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessVerificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $zip_file;
    public $token ;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($zip_file , $token )
    {
        $this->zip_file = $zip_file ;
        $this->token = $token ;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client();
        $endpoint = 'https://352e-41-188-104-163.ngrok.io/compare';
        try {
            $request = $client->post( $endpoint, [
                'verify'=>false,
                'headers' => ['Accept' => 'application/json'],
                'multipart' => [
                    ['name' => 'zip_file','contents' =>$this->zip_file],
                ]
            ]);
            return $request->getBody();
        } catch(\GuzzleHttp\Exception\ClientException $e){
            $response_data = $e->getMessage();
            return json_encode(["data" => $response_data],true);
        }
        catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $response_data = $e->getMessage();
            return json_encode(["data" => $response_data],true);
        }
        catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response_data = $e->getMessage();
            return json_encode(["data" => $response_data],true);
        }
    }
}
