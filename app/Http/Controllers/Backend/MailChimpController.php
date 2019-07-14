<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DrewM\MailChimp\MailChimp;

class MailChimpController extends Controller
{
    protected $mailChimp;

    public function __construct()
    {
        $this->mailChimp = new MailChimp(config("services.mailchimp.key"));
    }
}
