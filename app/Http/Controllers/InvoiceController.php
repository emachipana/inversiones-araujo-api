<?php

namespace App\Http\Controllers;

use App\Filters\InvoiceFilter;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Resources\InvoiceCollection;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $filter = new InvoiceFilter();
    $queryItems = $filter->transform($request);
    $invoices = Invoice::where($queryItems)
                  ->with("invoiceItems")
                  ->orderBy("created_at", "desc");

    return new InvoiceCollection($invoices->paginate(18)->appends($request->query()));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreInvoiceRequest $request)
  {
    return new InvoiceResource(Invoice::create($request->all()));
  }

  /**
   * Display the specified resource.
   */
  public function show(Invoice $invoice)
  {
    return new InvoiceResource($invoice->loadMissing("invoiceItems"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateInvoiceRequest $request, Invoice $invoice)
  {
    $invoice->update($request->all());

    return new InvoiceResource($invoice->loadMissing("invoiceItems"));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Invoice $invoice)
  {
    $invoice->vitroOrder()->update(["invoice_id" => NULL]);
    $invoice->order()->update(["invoice_id" => NULL]);
    $invoice->invoiceItems()->delete();

    $invoice->delete();
  }
}
