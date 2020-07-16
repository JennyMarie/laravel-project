@extends('layouts.app')

@section('css')
<style>
    .btns-group{
        display: flex;
        justify-content: space-between;
    }
</style>

@endsection

@section('content')

    @include('components.success_message')

    <div id="employeeTable" v-cloak>
        <div class="btns-group mb-2">
            <a class="btn btn-primary" href="{{route('employee.create')}}" role="button">Create</a>
            <button type="button" class="btn btn-danger" @click="deleteEmployee()" :disabled="toDelete.length == 0">Delete</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Position</th>
                    <th scope="col">Contact</th>
                </tr>
            </thead>
            <tbody>
                <template v-for="employee in employees">
                    <employee-table 
                    :key="employee.id" 
                    :employee="employee" 
                    @select="doSelectDelete"
                    ></employee-table>
                </template>
                <tr v-if="employees.length == 0">
                    <td colspan="5" class="text-center">NO DATA</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection

@section('js')
<script>
    var get_employee_route = "{{ route('api.get.employees') }}"
    var delete_employee_route = "{{ route('api.delete.employee') }}"
</script>
<script src="{{ asset('js/employee.js') }}"></script>

@endsection