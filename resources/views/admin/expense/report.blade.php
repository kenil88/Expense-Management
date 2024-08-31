<x-admin>
    @section('title','Expense')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Expense Table</h3>
        </div>
        <div class="card-body">.
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="site">Select Site</label>
                        <select name="site" class="form-control">
                            <option>Select Site</option>
                            <option value="1">Site 1</option>
                            <option value="2">Site 2</option>
                            <option value="3">Site 3</option>
                        </select>
                    </div>
                    </div>
                
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="supervisor">Select Supervisor</label>
                        <select name="supervisor" class="form-control">
                            <option>Select supervisor</option>
                            <option value="1">Supervisor1</option>
                            <option value="2">Supervisor 2</option>
                            <option value="3">Supervisor 3</option>
                        </select>
                    </div>
                    </div>
               
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="expense_type">Select Expense Type</label>
                        <select name="expense_type" class="form-control">
                            <option>Select Expense Type</option>
                            <option value="petrol">Petrol</option>
                            <option value="diesel">Diesel</option>
                            <option value="general_expense">General expense</option>
                            <option value="withdraw_by_any_labor">withdraw by any labor </option>
                        </select>
                    </div>
                    </div>
                
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="from_date">From Date</label>
                        <input type="date" name="from_date" id="from_date" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="to_date">To Date</label>
                        <input type="date" name="to_date" id="to_date" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="person_name">Name of Person</label>
                        <input type="text" name="person_name" id="person_name" class="form-control" placeholder="Enter person's name">
                    </div>
                    </div></div>
                    <button type="submit" class="btn btn-primary">Generate Report</button>
            <table class="table table-striped" id="expenseTable">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Site</th>
                        <th>Who give</th>
                        <th>Expense Date</th>
                        <th>Expense Rupee</th>
                        <th>Type of Expenditure</th>
                        <th>Detail of Expenditure</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $expense)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ 'site' . $expense->site }}</td>
                            <td>{{ 'supervisor' .$expense->supervisor }}</td>
                            <td>{{ $expense->expense_date }}</td>
                            <td>{{ $expense->expense_rupee }}</td>
                            <td>{{ $expense->expense_type }}</td>
                            <td>{{ $expense->detail_expsnse }}</td>
                            <td>{{ $expense->remarks }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No records found</td>
                        </tr>
                    @endforelse
                </tbody>
                 <tfoot>
                    <tr>
                        <td colspan="4" class="text-right font-weight-bold">Total Expense: {{ $totalExpense }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @section('js')
        <script>
            $(function() {
                $('#categoryTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>
