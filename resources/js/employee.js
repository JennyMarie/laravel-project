import EmployeeTable from './components/EmployeeTableComponent.vue';

const app = new Vue({
    el: '#employeeTable',
    data: {
        employees:[],
        toDelete: []
    },
    created(){
        this.getEmployees();
    },
    methods: {
        getEmployees(){
            axios
            .get(get_employee_route)
            .then(response => {
              this.employees = response.data
            })
        },
        doSelectDelete(item) {
            if (item.isCheck) {
                if(!this.toDelete.includes(item.id)) {
                    this.toDelete.push(item.id);
                }
            } else {
                if(this.toDelete.includes(item.id)) {
                    var index = this.toDelete.indexOf(item.id)
                    this.toDelete.splice(index, 1)
                }

            }
            
        },
        deleteEmployee(){
            let val = confirm("Are you sure to delete?")

            if(val == true){
                let temp = {
                    ids : this.toDelete
                }

                console.log(this.toDelete)

                axios({
                    method: "POST",
                    url: delete_employee_route,
                    data: temp
                }).then(resp => {
                    if(resp.data == 'success'){
                        this.getEmployees();
                    }
                })
            }
        },
    },
    components:{
        EmployeeTable
    },
    mounted() {
        
    }
});
