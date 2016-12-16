<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Validator;
use App\User;
use Hash;

class CreateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $useremail = $this->ask('Enter user email ?');
        $password = $this->ask('Enter password (min 6)');


        $validator = Validator::make(['email' => $useremail, 'password' => $password], [

            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',

        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {

                $this->error($error);

            }

            return false;
        }

        if (User::create(['email' => $useremail, 'password' => Hash::make($password)])) {

            $this->line('User: ' . $useremail . ' was created successfully');
        } else {

            $this->error('Error: unable to create user');

        }

    }
}
