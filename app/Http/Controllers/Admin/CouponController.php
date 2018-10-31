<?php
/**
 * Proneilrabbit - SMM Panel script
 * Domain: https://Proneil.com/
 * Codecanyon Item: https://codecanyon.net/item/Proneilrabbit-smm-panel/19821624
 *
 */

namespace App\Http\Controllers\Admin;

use App\Coupon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function index()
    {
        return view('admin.coupons.index');
    }

	
    public function indexData()
    {
        $coupons = Coupon::all();
        return datatables()
            ->of($coupons)
            ->addColumn('action', 'admin.coupons.index-buttons')
            ->editColumn('action', 'admin.coupons.index-buttons')
            ->toJson();
    }
	
    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {
        mpc_m_c($request->server('SERVER_NAME'));
        $this->validate($request, [
            'numero' => 'required|unique:posts|max:255',
			'porusuario' => 'required',
            'description' => 'required'
        ]);

        Coupon::create([
            'numero' => $request->input('numero'),
            'porusuario' => $request->input('porusuario'),
            'description' => $request->input('description'),
            'status' => $request->input('status')
        ]);

        Session::flash('alert', __('messages.created'));
        Session::flash('alertClass', 'success');
        return redirect('/admin/coupons/create');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit', compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'numero' => 'required',
			'porusuario' => 'required',
            'description' => 'required'
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->numero = $request->input('numero');
        $coupon->porusuario = $request->input('porusuario');
        $coupon->description = $request->input('description');
        $coupon->status = $request->input('status');
        $coupon->save();

        Session::flash('alert', __('messages.updated'));
        Session::flash('alertClass', 'success');
        return redirect('admin/coupons/'.$id.'/edit');

    }

    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        try {
            $coupon->delete();
        } catch (QueryException $ex) {
            //Session::flash('alert', __('messages.coupon_have_packages'));
            Session::flash('alertClass', 'danger');
            return redirect('/admin/coupons');
        }

        Session::flash('alert', __('messages.deleted'));
        Session::flash('alertClass', 'success');
        return redirect('/admin/coupons');
    }
}
