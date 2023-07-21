<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Ui;
use Illuminate\Http\Request;

class UiController extends Controller
{
    //INFORMATION create form
    public function UiInformation()
    {
          return view('backend/ui/create');

    }
    //INFROMATION STORE 
    Public function addUiInformation(Request $request)
    {
            
            $ui =new Ui();
            $ui->company_name = $request->name;
            $ui->logo = $request->logo;
            $ui->email = $request->email;
            $ui->address = $request->address;
            $ui->phone	 = $request->number;
            $ui->information = $request->information;

            $ui->save();
            return redirect()->route('Information.Index')->with('success',"Information added successfully");
    }
  /// information LIST
    public function informationIndex()
    {
        $ui = Ui::all();
        return view('backend.ui.index',compact('ui'));
    }
    //delete information
    public function deleteInformation($id)
    {
        $ui = Ui::find($id);
        $ui->delete();
        return redirect()->route('Information.Index')->with('success',"Information deleted");
    }
    //information edit
    public function editInformation($id)
    {
         $ui = Ui::find($id);
         return view('backend/ui/edit',compact('ui'));
    }

    public function updateInformation(Request $request, $id)
    {
        
        $validator = $request->validate([
            'company_name' => 'required',
            'email' =>'required',
            'address' =>'required|min:3',
            'number' =>'required|regex:/^98\d{8}$/',
            'information' =>'required|min:10',
        ]);
        $ui = Ui::find($id);
        $ui->company_name = $request->company_name;
        $ui->logo = $request->logo;
        $ui->email = $request->email;
        $ui->address = $request->address;
        $ui->phone = $request->number;
        $ui->information = $request->information;
         $ui->update();

         return redirect()->route('Information.Index')->with('success',"Information Updated Successfully");

    }


}
