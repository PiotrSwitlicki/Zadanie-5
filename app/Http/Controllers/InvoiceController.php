<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::latest()->paginate(5);
        
        return view('invoices.index', compact('invoices'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $request->validate([
            'name' => 'required',            
        ]);
        */
        $data['invoice_number'] = $request->input('invoice_number');
        $data['buyer_nip'] = $request->input('buyer_nip');
        $data['seller_nip'] = $request->input('seller_nip');
        $data['product_name'] = $request->input('product_name');
        $data['net_sum'] = $request->input('net_sum');
        $data['date'] = date("Y-m-d");
        $data['edit_date'] = $request->input('edit_date');
        Invoice::create($data);

        return redirect()->route('invoices.index')
            ->with('success', 'Faktura utworzona.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', compact('invoice'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        /*$request->validate([
            'name' => 'required',                        
        ]);*/
        $data['invoice_number'] = $request->input('invoice_number');
        $data['buyer_nip'] = $request->input('buyer_nip');
        $data['seller_nip'] = $request->input('seller_nip');
        $data['product_name'] = $request->input('product_name');
        $data['net_sum'] = $request->input('net_sum');
        $data['date'] = $request->input('date');
        $data['edit_date'] = date("Y-m-d");       
        $invoice->update($data);

        return redirect()->route('invoices.index')
            ->with('success', 'Project updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('invoices.index')
            ->with('success', 'Project deleted successfully');
    }
}
