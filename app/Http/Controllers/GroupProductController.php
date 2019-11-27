<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support;
use App\GroupProduct;
use App\ProductType;

class GroupProductController extends Controller
{
    public function getlist()
    {
    	$GroupProduct = GroupProduct::paginate(5);
    	return view('admin.GroupProduct.list',['GroupProduct'=>$GroupProduct]);
    }
    public function getadd()
    {
    	$ProductType = ProductType::all();
    	return view('admin.GroupProduct.AddGroupProduct',['ProductType' => $ProductType]);
    }

    public function postadd(Request $Request)
    {
    	$this->validate($Request,
    		[
    			'Name' => 'required|unique:GroupProduct,Name|min:3|max:100'
    		]
    		,
    		[
    			'Name.required'=>'Bạn chưa nhập tên',
    			'NewName.unique' => 'Tên đã có',
    			'Name.min'=>'Tên phải hơn 3 kí tự',
    			'Name.max'=>'tên phải ít hơn 100 kí tự',
    		]);
    	$GroupProduct = new GroupProduct;
    	$GroupProduct->Name = $Request->Name;
    	$GroupProduct->Content = $Request->Content;
    	if($Request->hasFile('Image'))
    	{
    		$file = $Request->file('Image');
    		$tail = $file->GetClientOriginalExtension();
    		if($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg')
    			return redirect('admin/GroupProduct/AddGroupProduct')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png và jpeg');
    		$name = $file->GetClientOriginalName();
    		$hinh = str_random(4)."_".$name;
    		while(file_exists('public/Update/GroupProduct/'.$hinh))
    		{
    			$hinh = str_random(4)."_".$name;
    		}
    		$file->move('public/update/GroupProduct',$hinh);
    		$GroupProduct->Image = $hinh;
    	}
    	else
    	{
    		$Request->Image = "";
    	}
    	$GroupProduct->Order = $Request->Order;
    	$GroupProduct->Status = $Request->Status;
    	$GroupProduct->ProductType_Id = $Request->ProductType;
    	$GroupProduct->save();

    	return redirect('admin/GroupProduct/AddGroupProduct')->with('thongbao','Thêm thành công');
    }

    public function getedit($Id)
    {
    	$GroupProduct = GroupProduct::find($Id);
    	$ProductType = ProductType::all();
    	return view('admin.GroupProduct.EditGroupProduct',['GroupProduct'=>$GroupProduct,'ProductType' => $ProductType]);
    }
    public function postedit(Request $Request,$Id)
    {
    	$this->validate($Request,
    		[
    			'NewName' => 'required|min:3|max:100'
    		]
    		,
    		[
    			'NewName.required' => 'Chưa nhập tên',
    			'NewName.min' => 'Phải hơn 3 kí tự',
    			'NewName.max' => 'Phải ít hơn 100 kí tự',
    		]);
    	$gp = GroupProduct::find($Id);
    	if($Request->hasFile('Image'))
    	{
    		$file = $Request->file('Image');
    		$tail = $file->GetClientOriginalExtension();
    		if($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg')
    			return redirect('admin/GroupProduct/AddGroupProduct')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png và jpeg');
    		$name = $file->GetClientOriginalName();
    		$Image = str_random(4)."_".$name;
    		while(file_exists('public/Update/GroupProduct/'.$Image))
    		{
    			$Image = str_random(4)."_".$name;
    		}
    		$file->move('public/Update/GroupProduct',$Image);
    	}
    	else
    		$Image = $gp->Image;
    	GroupProduct::where('Id',$Id)->update(['Name' => $Request->NewName,'Content' => $Request->Content,'Image'=>$Image,'Order'=>$Request->Order,'Status'=>$Request->Status,'ProductType_Id'=>$Request->ProductType]);
    	return redirect('admin/GroupProduct/EditGroupProduct/'.$Id)->with('thongbao','Sửa thành công rồi');
    }

    public function getdelete($Id)
    {
    	$GroupProduct = GroupProduct::where('Id',$Id)->delete();
    	//$GroupProduct = GroupProduct::findOrFail($Id);
    	//$GroupProduct->delete();
    	return redirect('admin/GroupProduct/list')->with('thongbao','Bạn đã xóa');
    }
}
