<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class processController extends Controller
{
   	public function tryToIntoSectionAdmin()
   	{
   		return Redirect('AdminPanel');
   	}
}
