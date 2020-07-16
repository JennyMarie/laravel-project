<template>

    <li class="todo-item">

        <input type="checkbox" class="todo-check-box" @click="markCompleted" v-model="todo.completed">
        <div class="item">
            <p class="todo-text" :class="{'is-completed':todo.completed}">{{todo.title}}</p>
        </div>
        <div>
            <a class="button" :href="todo.edit_url">
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </a>
            <button type="button" class="button" @click="deleteTodo"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </div>

    </li>
    
</template>

<script>
    export default {
        props: {
            todo:Object
        },
        data() {
            return {
            }
        },
        methods: {
            markCompleted(){
                this.todo.completed = !this.todo.completed
                this.updateTodo()
            },
            updateTodo(){
                let temp = {
                    id : this.todo.id,
                    completed : this.todo.completed,
                    title : this.todo.title,
                }

                axios({
                    method: "POST",
                    url: update_todo_route,
                    data: temp
                }).then(resp => {
                    
                })
            },
            deleteTodo(){
                this.$emit('del-todo', this.todo.id)
            },
        },
    }

</script>

<style lang="scss" scoped>
    .todo {
        &-item{
            display: grid;
            grid-template-columns: .5fr 3fr .5fr;
        }
    }
    .is-completed {
        text-decoration: line-through;
    }
</style>
