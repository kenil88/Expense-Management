<x-admin>
    @section('title','Expense')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Expense Table</h3>
            <div class="card-tools">
                <a href="{{ route('admin.expense.create') }}" class="btn btn-sm btn-info">New</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="expenseTable">
                <thead>
                    <tr>
                        <th>Site</th>
                        <th>Supervisor</th>
                        <th>Expense Date</th>
                        <th>Expense Rupee</th>
                        <th>Expense Type</th>
                        <th>Detail Expsnse</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $expense)
                        <tr>
                            <td>{{ 'site' . $expense->site }}</td>
                            <td>{{ 'supervisor' .$expense->supervisor }}</td>
                            <td>{{ $expense->expense_date }}</td>
                            <td>{{ $expense->expense_rupee }}</td>
                            <td>{{ $expense->expense_type }}</td>
                            <td>{{ $expense->detail_expsnse }}</td>
                            <td>{{ $expense->remarks }}</td>
                            <td><a href="{{ route('admin.expense.edit', encrypt($expense->id)) }}"
                                    class="btn btn-sm btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('admin.expense.destroy', encrypt($expense->id)) }}" method="POST"
                                    onsubmit="return confirm('Are sure want to delete?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @section('js')
        <script>
            $(function() {
                $('#expenseTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>
