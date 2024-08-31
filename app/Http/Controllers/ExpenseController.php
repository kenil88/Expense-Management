<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Expense::orderBy('id', 'DESC')->get();
        return view('admin.expense.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.expense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'site' => 'required',
            'supervisor' => 'required',
            'expense_date' =>  'required|date_format:m/d/Y h:i A',
            'expense_rupee' =>  'required|numeric',
            'expense_type' => 'required',
            'detail_expsnse' => 'required',
            'remarks' => 'required',
        ]);
        $expense_date = Carbon::createFromFormat('m/d/Y h:i A', $validatedData['expense_date'])->format('Y-m-d H:i:s');
        if ($validatedData) {
            $expense = new Expense();
            $expense->site = $request->site;
            $expense->supervisor = $request->supervisor;
            $expense->expense_date = $expense_date;
            $expense->expense_rupee = $request->expense_rupee;
            $expense->expense_type = $request->expense_type;
            $expense->detail_expsnse = $request->detail_expsnse;
            $expense->remarks = $request->remarks;
            $expense->save();
            return redirect()->route('admin.expense.index')->with('success', 'Expense created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showReport()
    {
        return view('admin.expense.report_form');
    }

    public function generateReport(Request $request)
    {
        $query = Expense::query();

        // Apply filters
        if ($request->filled('site')) {
            $query->where('site', $request->site);
        }
        if ($request->filled('supervisor')) {
            $query->where('supervisor', $request->supervisor);
        }
        if ($request->filled('expense_type')) {
            $query->where('expense_type', $request->expense_type);
        }
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('expense_date', [$request->from_date, $request->to_date]);
        }
        if ($request->filled('person_name')) {
            $query->where('detail_expsnse', 'like', '%' . $request->person_name . '%');
        }

        // Fetch filtered data
        $data = $query->get();

        $totalExpense = $data->sum('expense_rupee');

        return view('admin.expense.report', compact('data', 'totalExpense'));
    }
}
