import TodoItem from './components/TodoItemComponent.vue';

const app = new Vue({
    el: '#todos',
    data: {
        todos:[],
        toDelete: [],
        newTodo: null,
    },
    created(){
        this.getTodos();
    },
    methods: {
        getTodos(){
            axios
            .get(get_todo_route)
            .then(response => {
              this.todos = response.data
            })
        },
        createTodo(){
            let temp = {
                title : this.newTodo,
            }

            axios({
                method: "POST",
                url: create_todo_route,
                data: temp
            }).then(resp => {
                if(resp.data == 'success'){
                    this.newTodo = null;
                    this.getTodos();
                }
            })
        },
        deleteTodo(id){

            let temp = {
                id : id,
            }

            axios({
                method: "POST",
                url: delete_todo_route,
                data: temp
            }).then(resp => {
                if(resp.data == 'success'){
                    this.getTodos();
                }
            })
            
        },
    },
    components:{
        TodoItem
    },
    mounted() {
        
    }
});
