<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Http\Resources\ExpenseResource;
use App\Models\Expense;

class ExpenseController extends Controller
{
  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreExpenseRequest $request)
  {
    $data = $request->all();
    $sub_total = $data["price"] * $data["quantity"];
    $data["sub_total"] = $sub_total;
    $new_expense = Expense::create($data);
    $profit = $new_expense->profit;
    $expense = $profit->expense + $sub_total;
    $profit->update([
      "expense" => $expense,
      "profit" => $profit->income - $expense
    ]);

    return new ExpenseResource($new_expense);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateExpenseRequest $request, Expense $expense)
  {
    $data = $request->all();
    $profit = $expense->profit;
    $sub_total = $expense->sub_total;

    if(isset($data["price"]) && isset($data["quantity"])) {
      $sub_total = $data["price"] * $data["quantity"];
    }else if(isset($data["price"])) {
      $sub_total = $data["price"] * $expense->quantity;
    }else if(isset($data["quantity"])) {
      $sub_total = $expense->price * $data["quantity"];
    }

    $new_expense = ($profit->expense - $expense->sub_total) + $sub_total;
    $data["sub_total"] = $sub_total;
    $profit->update([
      "expense" => $new_expense,
      "profit" => $profit->income - $new_expense
    ]);
    $expense->update($data);

    return new ExpenseResource($expense);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Expense $expense)
  {
    $profit = $expense->profit;
    $new_expense = $profit->expense - $expense->sub_total;
    $profit->update([
      "expense" => $new_expense,
      "profit" => $profit->income - $new_expense
    ]);

    $expense->delete();
  }
}
