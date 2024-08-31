<x-admin>
    @section('title','Expense')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Expense Table</h3>
        </div>
        <div class="card-body">.
            <form action="{{ route('admin.expense.generateReport') }}" method="POST">
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
