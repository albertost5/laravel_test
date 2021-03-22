<?php

namespace App\Console\Commands;

use Exception;
use App\Models\User;
use App\Mail\UserRegisterMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prueba:register {user?} {pass?} {email?}';
    // ? optional parameters

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register one user';

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
     * @return int
     */
    public function handle()
    {
        
        $userId = $this->argument('user');
        

        if(!$userId || empty($userId)){
            $userId = $this->ask('What is your name?');
        }
        
        if(User::where('username', $userId)->exists()){
            $this->error('User already exists!');
            return 1;
        }

        $password = $this->argument('pass');

        if(!$password || empty($password)){
            $password = $this->ask('What is your password?');
        }

        $user = new User();
        $user->username = $userId;
        $user->password = Hash::make($password);

        $email = $this->argument('email');
        $user->email = $email;

        if($email && !empty($email) && User::where('email', $email)->exists()){
            $this->error('Email already in use!');
            return 1;
        }
        
        try{
            $user->save();
        }catch (Exception $e) {
            $this->error('Something went wrong!');
            return 1;
        }
        
        if($user->email && !empty($user->email)){
            
            Mail::to($user->email)->send(new UserRegisterMail($user->username, $password));
            
        }

        $this->info('The command was successful!');
        return 0;
    }
}
