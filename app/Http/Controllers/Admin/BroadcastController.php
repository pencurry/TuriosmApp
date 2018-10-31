<?php
/**
 * Proneilrabbit - SMM Panel script
 * Broadcast By Proneil.com
 *
 */
namespace App\Http\Controllers\Admin;

use App\Broadcast;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BroadcastController extends Controller
{

    public function index()
    {
        return view('admin.broadcast.index');
    }

    public function create()
    {
        return view('admin.broadcast.create');
    }

    public function indexData()
    {
        $broadcasts = Broadcast::all();
        return datatables()
            ->of($broadcasts)
            ->addColumn('action', 'admin.broadcast.index-buttons')
            ->toJson();
    }
    
    public function destroy($id)
    {
        $broadcasts = Broadcast::findOrFail($id);
        try {
            $broadcasts->delete();
        } catch (QueryException $ex) {
            Session::flash('alert', __('messages.user_have_orders'));
            Session::flash('alertClass', 'danger');
            return redirect('/admin/broadcast');
        }

        Session::flash('alert', __('messages.deleted'));
        Session::flash('alertClass', 'success');
        return redirect('/admin/broadcast');
    }

    public function addfunc(Request $request)
    {
        $this->validate($request, [
            'mtitle' => 'required',
            'mtext' => 'required',
            'mstatus' => 'required',
            'micon' => 'required',
            'mstime' => 'required',
            'metime' => 'required'            
        ]);
        Broadcast::create([
            'MsgTitle' => $request->input('mtitle'),
            'MsgText' => $request->input('mtext'),
            'MsgStatus' => $request->input('mstatus'),
            'Icon' => $request->input('micon'),
            'StartTime' => $request->input('mstime'),
            'ExpireTime' => $request->input('metime')
        ]);
        
        Session::flash('alert', 'Broadcast Created');
        Session::flash('alertClass', 'success');
        return redirect('admin');
    }

}