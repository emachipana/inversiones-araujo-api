<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceItemRequest;
use App\Http\Requests\UpdateInvoiceItemRequest;
use App\Http\Resources\InvoiceItemResource;
use App\Models\InvoiceItem;

class InvoiceItemController extends Controller
{
  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreInvoiceItemRequest $request)
  {
    return new InvoiceItemResource(InvoiceItem::create($request->all()));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateInvoiceItemRequest $request, InvoiceItem $invoiceItem)
  {
    $invoiceItem->update($request->all());

    return new InvoiceItemResource($invoiceItem);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(InvoiceItem $invoiceItem)
  {
    $invoiceItem->delete();
  }
}
