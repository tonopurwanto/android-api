<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('sync')) {
            $lastSync = $request->sync;
            $customers = Customer::with('detail')->where('DATECREATE', '>=', $lastSync)->get();
        } else {
            $customers = Customer::where('CSSTATID2', 'Master')->with('detail')->paginate(50);
        }

        $customers = $customers->toArray();

        $customers['data'] = array_map(function ($customer) {
            return [
                'custid'     => $customer['CUSTID'],
                'custname'   => $customer['CUSTNAME'],
                'alamat'     => $customer['INVADD1'],
                'kelurahan'  => $customer['INVADD3'],
                'kecamatan'  => $customer['INVADD4'],
                'kabupaten'  => $customer['INVADD2'],
                'hpupline'   => $customer['detail']['hpupline'],
                'price'      => $customer['detail']['levelprcid'],
                'created_at' => $customer['DATECREATE'],
                'updated_at' => $customer['DATEUPDATE'],
            ];
        }, $customers['data']);

        return $customers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
