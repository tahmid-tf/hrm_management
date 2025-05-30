<?php

namespace App\Http\Controllers\ExpenseManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with(['employee', 'category'])->latest()->get();
        return view('panel.essential.expense_management.expenses.index', compact('expenses'));
    }

    public function create()
    {
        $categories = ExpenseCategory::all();
        return view('panel.essential.expense_management.expenses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:expense_categories,id',
            'amount' => 'required|numeric|min:0',
            'expense_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        Expense::create([
            'employee_id' => Auth::id(),
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'expense_date' => $request->expense_date,
            'description' => $request->description,
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expense submitted successfully.');
    }

    public function show(Expense $expense)
    {
        return view('panel.essential.expense_management.expenses.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
//        $this->authorize('update', $expense); // optional policy
        $categories = ExpenseCategory::all();
        return view('panel.essential.expense_management.expenses.edit', compact('expense', 'categories'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'category_id' => 'required|exists:expense_categories,id',
            'amount' => 'required|numeric|min:0',
            'expense_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $expense->update($request->only('category_id', 'amount', 'expense_date', 'description'));

        return redirect()->route('expenses.index')->with('success', 'Expense updated.');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Expense deleted.');
    }

    // --------------------------- Bulk accept expense ---------------------------
    public function bulkAccept(Request $request)
    {
        $ids = $request->input('selected_expenses');

        // Guard clause for empty selection
        if (empty($ids) || !is_array($ids)) {
            return back()->with('error', 'Please select at least one expense.');
        }

        $updated = Expense::whereIn('id', $ids)
            ->where('status', 'pending')
            ->update(['status' => 'approved']);

        if ($updated > 0) {
            return redirect()->route('expenses.index')->with('success', "$updated expense(s) accepted successfully.");
        }

        return redirect()->route('expenses.index')->with('error', 'No eligible expenses were found to accept.');
    }

    // --------------------------- Bulk reject expense ---------------------------

    public function bulkReject(Request $request)
    {
        $ids = $request->input('selected_expenses');

        if (empty($ids) || !is_array($ids)) {
            return back()->with('error', 'Please select at least one expense.');
        }

        $updated = Expense::whereIn('id', $ids)
            ->where('status', 'pending')
            ->update(['status' => 'rejected']);

        if ($updated > 0) {
            return redirect()->route('expenses.index')->with('success', "$updated expense(s) rejected successfully.");
        }

        return redirect()->route('expenses.index')->with('error', 'No eligible expenses were found to reject.');
    }

}
