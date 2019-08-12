<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

use App\Contacts;
use App\ClinicList;
use Illuminate\Support\Facades\Mail;
use Carbon;