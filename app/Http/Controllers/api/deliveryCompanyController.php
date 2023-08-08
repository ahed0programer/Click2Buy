<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\deliveryCompanyAddressResource;
use App\Models\deliveryCompany;
use App\Models\deliveryCompanyAddress;
use Illuminate\Http\Request;

class deliveryCompanyController extends Controller
{
    public function deliveryCompany()
    {
        $deliveryCompany = deliveryCompany::get(['id' , 'name']);
        return response()->json([
            'deliveryCompany' => $deliveryCompany
        ]);
    }

    public function deliveryCompanyaddress($id)
    {
        $deliveryCompanyaddress = deliveryCompanyAddress::where('delivery_companies_id' , $id)->get();
        return response()->json([
            'deliveryCompany' => deliveryCompanyAddressResource::collection($deliveryCompanyaddress)
        ]);
    }
}
