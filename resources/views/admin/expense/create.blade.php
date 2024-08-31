<x-admin>
    @section('title','Create Expense')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Expense</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.expense.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('admin.expense.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="site">Select a site</label>
                                <select name="site" class="form-control">
                                    <option>Select Site</option>
                                    <option value="1">Site 1</option>
                                    <option value="2">Site 2</option>
                                    <option value="3">Site 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="supervisor">Select your name</label>
                                <select name="supervisor" class="form-control">
                                    <option>Select Site</option>
                                    <option value="1">Supervisor1</option>
                                    <option value="2">Supervisor 2</option>
                                    <option value="3">Supervisor 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="supervisor">Expense Date</label>
                                <input type="text" class="form-control datetimepicker-input" id="expense_date" name="expense_date" required value="{{ old('expense_date') }}">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="supervisor">Expenditure Rs</label>
                                <input type="text" class="form-control" id="expense_rupee" name="expense_rupee" required value="{{ old('expense_rupee') }}">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="supervisor">Type of Expenditure</label>
                                <select name="supervisor" class="form-control">
                                    <option>Select Site</option>
                                    <option value="petrol">Petrol</option>
                                    <option value="diesel">Diesel</option>
                                    <option value="general_expense">General expense</option>
                                    <option value="withdraw_by_any_labor">withdraw by any labor </option>
                                </select>
                                <input type="text" class="form-control" name="detail_expsnse">
                            </div>
                        </div>
                         <div class="card-body">
                            <div class="form-group">
                                <label for="supervisor">Remarks</label>
                                <textarea name="remarks" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin>
