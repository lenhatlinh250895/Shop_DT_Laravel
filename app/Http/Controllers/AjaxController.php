<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupProduct;

class AjaxController extends Controller
{
    public function getGroupProduct($ProductType_Id)
    {
    	$GroupProduct = GroupProduct::where('ProductType_Id',$ProductType_Id)->get();
    	foreach($GroupProduct as $gp)
    	{
    		echo "<option value='".$gp->Id."'>".$gp->Name."</option>";
    	}
    }
}
